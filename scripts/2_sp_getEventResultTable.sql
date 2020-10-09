DELIMITER
//

CREATE PROCEDURE GetEventResultsTable(
	IN targetEventResultId INT
)
BEGIN
	set @cases = null;
	set @pivotedFields = null;

	select group_concat(
		distinct concat(
			"CASE WHEN disciplineid = ",
			disciplineid,
			" THEN result END AS d",
			disciplineid
		)
	)
	into @cases
	from athletetoeventresults
	where eventresultsid = targetEventResultId;

	select group_concat(
		distinct concat(
			"SUM(d",
			disciplineid,
			") AS d",
			disciplineid
		)
	)
	into @pivotedFields
	from athletetoeventresults
	where eventresultsid = targetEventResultId;

	set @q = concat(
		"SELECT firstname, lastname, pageUrl, categoryid, ", @pivotedFields,
		" FROM (SELECT Q.*,",
		@cases,
			" FROM (SELECT athleteid, categoryid, disciplineid, result
				FROM athletetoeventresults, discipline, category
				WHERE eventresultsid = ", targetEventResultId, " AND disciplineid = discipline.id AND categoryid = category.id)
			AS Q)
		AS H, athlete, category
		WHERE athlete.id = athleteid AND category.id = categoryid
		GROUP BY athleteid, categoryid
		ORDER BY priority DESC"
	);

	prepare stmt from @q;
	execute stmt;
	deallocate prepare stmt;
END
//

DELIMITER ;
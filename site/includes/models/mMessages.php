<?php

class mMessages extends DatabaseHandler
{

    public function getMessages()
    {
        $query = 'SELECT *
                    FROM messages
                    WHERE startDate <= CURDATE() AND endDate >= CURDATE()
                    ORDER BY startDate DESC';
        return parent::query($query);
    }

}

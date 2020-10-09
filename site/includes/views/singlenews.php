<h1 class="lato medium">Doje is da new god</h1>
<hr>

<div class="wrapper">
    <div class="left">
        <p class="date lato light">2020-10-10</p>

        <?php
echo static::GetTextHtml();
echo static::GetResultTable();
?>

        <p class="lato thin">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea voluptate vero minus dolores tenetur odio dolorum, maiores explicabo, consectetur hic deserunt quod
            perspiciatis
            <b>aliquid</b> provident qui itaque quas possimus nulla. Vel voluptate labore odio ea, nulla itaque deleniti porro tenetur esse obcaecati tempore excepturi accusantium consectetur fugiat!
            Ducimus,
            modi
            provident?
        </p>
    </div>

    <div class="right">
        <img src="/assets/news/<?php echo static::$img; ?>">
    </div>
</div>

<h4 class="lato bold">Titre du tableau!</h4>
<div class="table-wrapper">
    <table>
        <tbody>
            <tr>
                <th class="lato bold">Athlète</th>
                <th class="lato bold">Trampoline</th>
                <th class="lato bold">Double-mini trampoline</th>
                <th class="lato bold">Trampoline synchronisé</th>
            </tr>
            <tr>
                <td colspan="5" class="lato medium">N5 whatever</td>
            </tr>
            <tr>
                <td><a href="/teams/stephane" class="lato thin">Stephane</a></td>
                <td class="lato light">Or</td>
                <td class="lato light">5</td>
                <td class="lato light">9</td>
            </tr>
            <tr>
                <td><a href="/teams/michael" class="lato thin">Michael</a></td>
                <td class="lato light">6</td>
                <td></td>
                <td class="lato light">9</td>
            </tr>
        </tbody>
    </table>
</div>
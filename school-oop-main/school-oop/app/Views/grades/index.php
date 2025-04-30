<?php

$tableBody = "";
foreach ($grades as $grade) {
    $tableBody .= <<<HTML
            <tr>
                <td>{$grade->id}</td>
                <td>{$grade->student_id}</td>
                <td>{$grade->subject_id}</td>
                <td>{$grade->mark}</td>
                <td>{$grade->date}</td>
                <td class='flex float-right'>
                    <form method='post' action='/grades/edit'>
                        <input type='hidden' name='id' value='{$grade->id}'>
                        <button type='submit' name='btn-edit' title='Módosít'><i class='fa fa-edit'></i></button>
                    </form>
                    <form method='post' action='/grades'>
                        <input type='hidden' name='id' value='{$grade->id}'>    
                        <input type='hidden' name='_method' value='DELETE'>
                        <button type='submit' name='btn-del' title='Töröl'><i class='fa fa-trash trash'></i></button>
                    </form>
                </td>
            </tr>
            HTML;
}

$html = <<<HTML
        <table id='admin-grades-table' class='admin-grades-table'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanuló #</th>
                    <th>Tantárgy #</th>
                    <th>Jegy</th>
                    <th>Dátum</th>
                    <th>
                        <form method='post' action='/grades/create'>
                            <button type="submit" name='btn-plus' title='Új'>
                                <i class='fa fa-plus plus'></i>&nbsp;Új</button>
                        </form>
                    </th>
                </tr>
            </thead>
             <tbody>%s</tbody>
            <tfoot>
            </tfoot>
        </table>
        HTML;

echo sprintf($html, $tableBody);

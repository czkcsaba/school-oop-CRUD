<?php

$tableBody = "";
foreach ($students as $student) {
    $tableBody .= <<<HTML
            <tr>
                <td>{$student->id}</td>
                <td>{$student->name}</td>
                <td>{$student->class_id}</td>
                <td class='flex float-right'>
                    <form method='post' action='/students/edit'>
                        <input type='hidden' name='id' value='{$student->id}'>
                        <button type='submit' name='btn-edit' title='Módosít'><i class='fa fa-edit'></i></button>
                    </form>
                    <form method='post' action='/students'>
                        <input type='hidden' name='id' value='{$student->id}'>    
                        <input type='hidden' name='_method' value='DELETE'>
                        <button type='submit' name='btn-del' title='Töröl'><i class='fa fa-trash trash'></i></button>
                    </form>
                </td>
            </tr>
            HTML;
}

$html = <<<HTML
        <table id='admin-students-table' class='admin-students-table'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Név</th>
                    <th>Osztály #</th>
                    <th>
                        <form method='post' action='/students/create'>
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

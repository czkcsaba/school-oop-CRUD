<?php
$html = <<<HTML
    <form method='post' action='/students'>
        <input type='hidden' name='_method' value='PATCH'>
        <input type="hidden" name="id" value="{$student->id}">
        <fieldset>
            <label for="name">Név</label>
            <input type="text" name="name" id="name" 
                value="{$student->name}">
            <br>
            <label for="class_id">Osztály #</label>
            <input type="text" name="class_id" id="class_id" 
                value="{$student->class_id}">
            <hr>
            <button type="submit" name="btn-update"><i class="fa fa-save">                    
                </i>&nbsp;Mentés
            </button>
            <a href="/students"><i class="fa fa-cancel"></i>&nbsp;Mégse
            </a>
        </fieldset>
    </form>
    HTML;

echo $html;

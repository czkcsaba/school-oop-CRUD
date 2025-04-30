<?php
$html = <<<HTML
    <form method='post' action='/grades'>
        <input type='hidden' name='_method' value='PATCH'>
        <input type="hidden" name="id" value="{$grade->id}">
        <fieldset>
            <label for="student_id">Tanuló #</label>
            <input type="text" name="student_id" id="student_id" 
                value="{$grade->student_id}">
            <br>
            <label for="subject_id">Tantárgy #</label>
            <input type="text" name="subject_id" id="subject_id" 
                value="{$grade->subject_id}">
            <br>
            <label for="mark">Jegy</label>
            <input type="text" name="mark" id="mark" 
                value="{$grade->mark}">
            <br>
            <label for="date">Dátum</label>
            <input type="text" name="date" id="date" 
                value="{$grade->date}">
            <hr>
            <button type="submit" name="btn-update"><i class="fa fa-save">                    
                </i>&nbsp;Mentés
            </button>
            <a href="/grades"><i class="fa fa-cancel"></i>&nbsp;Mégse
            </a>
        </fieldset>
    </form>
    HTML;

echo $html;

<?php
echo <<<HTML
        <form method='post' action='/grades'>
            <fieldset>
                <label for="student_id">Tanuló #</label>
                <input type="text" name="student_id" id="student_id">
                <br>
                <label for="subject_id">Tantárgy #</label>
                <input type="text" name="subject_id" id="subject_id">
                <br>
                <label for="mark">Jegy</label>
                <input type="text" name="mark" id="mark">
                <br>
                <label for="date">Dátum</label>
                <input type="text" name="date" id="date">
                <hr>
                <button type="submit" name="btn-save">
                    <i class="fa fa-save"></i>&nbsp;Mentés
                </button>
                <a href="/grades"><i class="fa fa-cancel">                    
                    </i>&nbsp;Mégse
                </a>
            </fieldset>
        </form>
    HTML;

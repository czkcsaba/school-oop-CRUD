<?php
echo <<<HTML
        <form method='post' action='/students'>
            <fieldset>
                <label for="name">Név</label>
                <input type="text" name="name" id="name">
                <br>
                <label for="class_id">Osztály #</label>
                <input type="text" name="class_id" id="class_id">
                <hr>
                <button type="submit" name="btn-save">
                    <i class="fa fa-save"></i>&nbsp;Mentés
                </button>
                <a href="/students"><i class="fa fa-cancel">                    
                    </i>&nbsp;Mégse
                </a>
            </fieldset>
        </form>
    HTML;

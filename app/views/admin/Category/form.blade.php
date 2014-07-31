<div class="box box-warning">
    <div class="box-header">
        <h3 class="box-title">General Elements</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <form role="form">
            <!-- text input -->
            <div class="form-group">
                <label>Text</label>
                <input type="text" class="form-control" placeholder="Enter ...">
            </div>
            <div class="form-group">
                <label>Text Disabled</label>
                <input type="text" class="form-control" placeholder="Enter ..." disabled="">
            </div>

            <!-- textarea -->
            <div class="form-group">
                <label>Textarea</label>
                <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
            </div>
            <div class="form-group">
                <label>Textarea Disabled</label>
                <textarea class="form-control" rows="3" placeholder="Enter ..." disabled=""></textarea>
            </div>

            <!-- input states -->
            <div class="form-group has-success">
                <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Input with success</label>
                <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
            </div>
            <div class="form-group has-warning">
                <label class="control-label" for="inputWarning"><i class="fa fa-warning"></i> Input with warning</label>
                <input type="text" class="form-control" id="inputWarning" placeholder="Enter ...">
            </div>
            <div class="form-group has-error">
                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input with error</label>
                <input type="text" class="form-control" id="inputError" placeholder="Enter ...">
            </div>

            <!-- checkbox -->
            <div class="form-group">
                <div class="checkbox">
                    <label class="">
                        <div class="icheckbox_minimal" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                        Checkbox 1
                    </label>
                </div>

                <div class="checkbox">
                    <label>
                        <div class="icheckbox_minimal" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                        Checkbox 2
                    </label>
                </div>

                <div class="checkbox">
                    <label>
                        <div class="icheckbox_minimal disabled" aria-checked="false" aria-disabled="true" style="position: relative;"><input type="checkbox" disabled="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                        Checkbox disabled
                    </label>
                </div>
            </div>

            <!-- radio -->
            <div class="form-group">
                <div class="radio">
                    <label class="">
                        <div class="iradio_minimal checked" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                        Option one is this and that—be sure to include why it's great
                    </label>
                </div>
                <div class="radio">
                    <label class="">
                        <div class="iradio_minimal" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                        Option two can be something else and selecting it will deselect option one
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <div class="iradio_minimal disabled" aria-checked="false" aria-disabled="true" style="position: relative;"><input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" disabled="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                        Option three is disabled
                    </label>
                </div>
            </div>

            <!-- select -->
            <div class="form-group">
                <label>Select</label>
                <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                </select>
            </div>
            <div class="form-group">
                <label>Select Disabled</label>
                <select class="form-control" disabled="">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                </select>
            </div>

            <!-- Select multiple-->
            <div class="form-group">
                <label>Select Multiple</label>
                <select multiple="" class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                </select>
            </div>
            <div class="form-group">
                <label>Select Multiple Disabled</label>
                <select multiple="" class="form-control" disabled="">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                </select>
            </div>

        </form>
    </div><!-- /.box-body -->
</div>
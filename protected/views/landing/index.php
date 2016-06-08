<script type="text/javascript">

    function submitForm(isPost) {

        var isError = false;

        if ($('#name').val() == '') {

            $('#spn_name').show();
            isError = true;

        } else {

            $('#spn_name').hide();
        }

        if ($('#phone').val() == '') {

            $('#spn_phone').show();
            isError = true;

        } else {

            $('#spn_phone').hide();
        }

        if ($('#email').val() == '') {

            $('#spn_email').show();
            isError = true;

        } else {

            $('#spn_email').hide();
        }

        if ($('#message').val() == '') {

            $('#spn_message').show();
            isError = true;

        } else {

            $('#spn_message').hide();
        }

        if (isPost != undefined && isError == false) {

            $('#lblMsg').html('<h5 style="margin-top: 10px; color: blue">Sending information. Please wait....</h5>').show();

            $.ajax({
                type: "POST",
                url: '',
                data: $('#form-enquiry').serialize(),
                success: function (data) {

                    if (data == 'done') {

                        $('input, textarea').val('');
                        $('#lblMsg').html('<h5 style="margin-top: 10px; color: green">Your information submitted successfully.</h5>').show();

                    } else {

                        alert(data);
                    }
                },
            });
        }
    }
</script>
<div class="container" style="margin-top: 150px">
    <div class="row-fluid">
        <div class="span8 text-center">
            <?php echo $model->page_content; ?>
            <?php if (!empty($model->background_image)) { ?>
                <img src="<?php echo Yii::app()->baseUrl; ?>/upload/landingpageimages/<?php echo $model->background_image; ?>" class="img-responsive"/>
            <?php } ?>
        </div>
        <div class="span4">
            <div class="well pull-right" style="opacity: 0.9; border-color: #A2A19C">
                <h1 style="margin-top: 0px">Register here</h1>
                <form id="form-enquiry" name="form-enquiry">
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" id="name" class="form-control span12 no-margin" placeholder="Name" onblur="javascript:submitForm();">
                        <span id="spn_name" class="textRed" style="color:Red;display:none;">* required</span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label>Contact number</label>
                        <input name="phone" type="text" id="phone" class="form-control span12 no-margin" placeholder="Contact number" onblur="javascript:submitForm();">
                        <span id="spn_phone" class="textRed" style="color:Red;display:none;">* required</span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="text" id="email" class="form-control span12 no-margin" placeholder="Email Address" onblur="javascript:submitForm();">
                        <span id="spn_email" class="textRed" style="color:Red;display:none;">* required</span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label>Post code</label>
                        <input name="postcode" type="text" id="postcode" class="form-control span12 no-margin" placeholder="Post code" onblur="javascript:submitForm();">
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea name="message" rows="5" id="message" class="form-control span12 no-margin" placeholder="Message" style="height:75px;" onblur="javascript:submitForm();"></textarea>
                        <span id="spn_message" class="textRed" style="color:Red;display:none;">* required</span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label>Best Time to Contact</label>
                        <select name="best_time" id="best_time" class="form-control span12 no-margin">
                            <option value="Morning">Morning</option>
                            <option value="Noon">Noon</option>
                            <option value="Afternoon">Afternoon</option>
                            <option value="Evening">Evening</option>
                        </select>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <a id="btnSend" class="btn btn-primary btn-lg btn-block" href="javascript:submitForm(true);">Send Email</a>
                        <span id="lblMsg" style="display: none"><h5 style="margin-top: 10px; color: blue">Sending information. Please wait....</h5></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



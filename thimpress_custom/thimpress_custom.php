<?php

//Custom register form

// Add script handle require fields on footer
add_action('wp_print_footer_scripts', function () {
    ?>
    <script>
        ;(function ($) {
            $(function () {
                let el_auto_login = $('form.auto_login');

                el_auto_login.on('submit', function (e) {

                    let elChoice = $('#custom_info');
                    let elChoiceVal = elChoice.val();

                    if (!elChoiceVal) {
                        elChoice.css('border', '1px solid red');
                        e.preventDefault();
                        return;
                    }

                    if (!setRequired(elChoiceVal)) {
                        return false;
                        e.preventDefault();
                    } else {
                        //el_auto_login.submit();
                    }
                });

                function setRequired(el) {
                    var flag = true;
                    var elId = $('#' + el);
                    var inputs = elId.find('input');
                    var inputRadioArr = [];

                    $.each(inputs, function (i) {
                        var elInput = $(inputs[i]);
                        var val = elInput.val();

                        if (elInput.attr('type') === 'radio') {
                            var inputName = elInput.attr('name');

                            if (inputRadioArr.indexOf(inputName) === -1) {

                                inputRadioArr.push(inputName);
                                var elInputRadio = $('input[name=' + inputName + ']');

                                if (!elInputRadio.is(':checked')) {
                                    elInputRadio.css('border', '1px solid red');
                                    flag = false;
                                }
                            }
                        } else {
                            if (!val.length) {
                                elInput.attr('required', true);
                                flag = false;
                            } else {
                                elInput.removeAttr('required');
                            }
                        }

                    });
                    return flag;
                }

                $('#custom_info').on('change', function () {
                    if (this.value == 'company') {
                        $('#company').css('display', 'block');
                        $('#individual').css('display', 'none');

                    } else if (this.value == 'individual') {
                        $('#company').css('display', 'none');
                        $('#individual').css('display', 'block');

                    } else {
                        $('#company').css('display', 'none');
                        $('#individual').css('display', 'none');
                    }
                });
            });
        }(jQuery));

    </script>
    <?php
});

//show form in page register

add_action('register_form', 'learnpress_register_form');
function learnpress_register_form()
{
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <div class="custom_info">
        <p><select id="custom_info" name="custom_info">
                <option value>Who are you</option>
                <option value="company">Are you a company?</option>
                <option value="individual">Are you an individual customer ?</option>
            </select></p>
    </div>
    <br>
    <div id="company" style="display: none">
        <p>
            <input placeholder="<?php esc_html_e('Enter the full Company name.', 'eduma'); ?>"
                   type="text" id="company" name="company"
                   required/>

        </p>
        <p>
            <input placeholder="<?php esc_html_e('Country', 'eduma'); ?>"
                   type="text" id="Country" name="Country"
                   required/>

        </p>
        <p>
            <input placeholder="<?php esc_html_e('Town', 'eduma'); ?>"
                   type="text" id="Town" name="Town"
                   required/>

        </p>
        <p>
            <input placeholder="<?php esc_html_e(' Company Address', 'eduma'); ?>"
                   type="text" id="company_address" name="company_address"
                   required/>

        </p>
        <p>
            <input placeholder="<?php esc_html_e(' ZIP Code', 'eduma'); ?>"
                   type="text" id=" ZIP_Code" name="ZIP_Code"
                   required/>

        </p>
        <p>
            <input placeholder="<?php esc_html_e('  Value Added Tax (VAT) ', 'eduma'); ?>"
                   type="text" id=" Value_Added_Tax" name="Value_Added_Tax"
                   required/>

        </p>
        <p>
            <input placeholder="<?php esc_html_e(' E-mail', 'eduma'); ?>"
                   type="text" id=" email" name="email"
                   required/>

        </p>
        <p>
            <input placeholder="<?php esc_html_e('Phone Number', 'eduma'); ?>"
                   type="text" id="Phone_Number" name="Phone_Number"
                   required/>

        </p>


    </div>


    <div id="individual" style="display: none">
        <p><input placeholder="<?php esc_html_e(' Name and Surname', 'eduma'); ?>"
                  type="text" id="first_last_name" name="first_last_name" class="input"/></p>
        <label><strong> Birthdate </strong></label><br>
        <p><input placeholder="<?php esc_html_e('Birthdate', 'eduma'); ?>"
                  type="date" id="birthday" name="birthday"
                  class="input"/></p>
        <br>
        <p><input placeholder="<?php esc_html_e('Birthplace', 'eduma'); ?>"
                  type="text" id="birth_place" name="birth_place"
                  class="input"/></p>
        <p><strong>Gender:</strong></p>
        <input type="radio" id="man" name="gender" value="man">
        <label for="man"> Man </label><br>
        <input type="radio" id="woman" name="gender" value="woman">
        <label for="woman">Woman</label><br>

        <p><input placeholder="<?php esc_html_e('Residential address: street and number* ', 'eduma'); ?>"
                  type="text" id="residence_address" name="residence_address"
                  class="input"/></p>


        <p><input placeholder="<?php esc_html_e('Country', 'eduma'); ?>"
                  type="text" id="country" name="country"
                  class="input"/></p>


        <p><input placeholder="<?php esc_html_e(' Postal Code ', 'eduma'); ?>"
                  type="text" id="postal_code" name="postal_code"
                  class="input"/></p>



        <p><input placeholder="<?php esc_html_e(' What brand and make of car do you have?', 'eduma'); ?>"
                  type="text" id="car_make_and_model" name="car_make_and_model"
                  class="input"/></p>

        <p><input placeholder="<?php esc_html_e(' What colour is your car? ', 'eduma'); ?>"
                  type="text" id="car_color" name="car_color"
                  class="input"/></p>
		<label for="want_to_clean"><strong> What is the cleaning step would you like to better know?</strong></label>
        <p><input type="text" id="want_to_clean" name="want_to_clean"class="input"/></p>

		<label for="car_protection_wax"><strong>What kind of wax do you use to protect your car?</strong></label>
        <p><input type="text" id="car_protection_wax" name="car_protection_wax"class="input"/></p>

        <p><input placeholder="<?php esc_html_e(' What Brand did you buy before Maniac line?', 'eduma'); ?>"
                  type="text" id="primo_marchio" name="primo_marchio"
                  class="input"/></p>

        <p><input placeholder="<?php esc_html_e(' What are your favourites products?', 'eduma'); ?>"
                  type="text" id="favorite_product" name="favorite_product"
                  class="input"/></p>


		<label for="used_car_body_products"><strong> What product do you usually use to treat your body car?</strong></label>

        <p><input 
                  type="text" id="used_car_body_products" name="used_car_body_products"
                  class="input"/></p>

        <p><strong> How much do you spend to take car of your car in a year?</strong></p>
        <input type="radio" id="50_euro" name="car_care_money" value="50_euro" class="input radio_style">
        <label for="50_euro">  until 50 euro </label><br>

        <input type="radio" id="100_euro" name="car_care_money" value="100_euro" class="input radio_style">
        <label for="100_euro">  until 100 euro</label><br>

        <input type="radio" id="oltre_100_euro" name="car_care_money" value="oltre_100_euro" class="input radio_style">
        <label for="oltre_100_euro">  over 100 euro</label><br>

        <p><strong> How many times do you take your car to the carwash?</strong></p>

        <input type="radio" id="1_time_per_month" name="number_of_car_washes" value="1_time_per_month"
               class="input radio_style">
        <label for="1_time_per_month">Once a month</label><br>

 		<input type="radio" id="2_time_per_month" name="number_of_car_washes" value="2_time_per_month"
               class="input radio_style">
        <label for="2_time_per_month">Twice a month</label><br>

     
        <input type="radio" id="4_time_per_month" name="number_of_car_washes" value="4_time_per_month"
               class="input radio_style">
        <label for="4_time_per_month">  4 times a year </label><br>

        <input type="radio" id="never" name="number_of_car_washes" value="never" class="input radio_style">
        <label for="never"> Never</label><br>

        <p><strong> Do you know what detailing is?</strong></p>
        <input type="radio" id="detailing_yes" name="detailing" value="yes" class="input radio_style">
        <label for="detailing_yes"> Yes I do</label><br>

        <input type="radio" id="detailing_no" name="detailing" value="no" class="input radio_style">
        <label for="detailing_no">No, I don’t</label><br>

        <p><strong> Do you think you should become a Maniac Line Vip Customer?</strong></p>
        <input type="radio" id="yes" name="vip_customer" value="yes" class="input radio_style">
        <label for="yes"> Yes I do</label><br>

        <input type="radio" id="no" name="vip_customer" value="no" class="input radio_style">
        <label for="no">No, I don’t</label><br>
    </div>
    <br>
<?php } ?>


<?php
// Finally, save our extra registration user meta.
add_action('user_register', 'learnpress_user_register');
function learnpress_user_register($user_id)
{
    if(empty($_POST['custom_info'])) {
        return;
    }

    if (!empty($_POST['custom_info'])) {
        update_user_meta($user_id, 'custom_info', trim($_POST['custom_info']));

//        if ($_POST['custom_info'] == "company") {
//            if (!empty($_POST['company'])) {
//                update_user_meta($user_id, 'company', trim($_POST['company']));
//            }
//        } elseif ($_POST['custom_info'] == "individual") {
//            if (!empty($_POST['first_last_name']) && !empty($_POST['birthday']) && !empty($_POST['birth_place'])&& !empty($_POST['gender'])
//                && !empty($_POST['residence_address'])&& !empty($_POST['car_make_and_model'])&& !empty($_POST['car_color'])&& !empty($_POST['want_to_clean'])
//                && !empty($_POST['car_protection_wax'])&& !empty($_POST['primo_marchio'])&& !empty($_POST['favorite_product'])&& !empty($_POST['used_car_body_products'])
//                && !empty($_POST['car_care_money'])&& !empty($_POST['number_of_car_washes'])&& !empty($_POST['detailing'])&& !empty($_POST['vip_customer'])
//            ) {
//                $fields_arr = array(
//                    'first_last_name',
//                    'birthday',
//                    'birth_place',
//                    'gender',
//                    'residence_address',
//                    'car_make_and_model',
//                    'car_color',
//                    'want_to_clean',
//                    'car_protection_wax',
//                    'primo_marchio',
//                    'favorite_product',
//                    'used_car_body_products',
//                    'car_care_money',
//                    'number_of_car_washes',
//                    'detailing',
//                    'vip_customer',
//                );
//                foreach ($fields_arr as $field) {
//                    update_user_meta($user_id, $field, trim($_POST[$field]));
//                }
//            }
//        }
        $field_custom_info = LP_Helper::sanitize_params_submitted($_POST['custom_info']);

        if ($field_custom_info == "company") {
            if (!empty($_POST['company'])) {
                // update_user_meta($user_id, 'company', trim($_POST['company']));

                $fields_arr_company = array(
                'company',
                'Country',
                'Town',
                'company_address',
                'ZIP_Code',
                'Value_Added_Tax',
                'email',
                'Phone_Number',
                
            );
            foreach ($fields_arr_company as $field) {
                if(!empty($_POST[$field]) ) {
                    update_user_meta($user_id, $field, trim($_POST[$field]));
                }
            }




            }
        } elseif ($field_custom_info == "individual") {

            $fields_arr = array(
                'first_last_name',
                'birthday',
                'birth_place',
                'gender',
                'residence_address',
                'country',
                'postal_code',
                'car_make_and_model',
                'car_color',
                'want_to_clean',
                'car_protection_wax',
                'primo_marchio',
                'favorite_product',
                'used_car_body_products',
                'car_care_money',
                'number_of_car_washes',
                'detailing',
                'vip_customer',
            );
            foreach ($fields_arr as $field) {
                if(!empty($_POST[$field]) ) {
                    update_user_meta($user_id, $field, trim($_POST[$field]));
                }
            }

        }
    }

}

//display registration form information
function show_custom_register_form($user)
{
    ?>
    <table id="custom_user_field_table" class="form-table">
        <tr id="custom_user_field_row">
            <th>
                <label for="custom_info"><?php _e('Who are you', 'eduma'); ?></label>
            </th>
            <td>
                <input type="text" name="custom_info" id="custom_info"
                       value="<?php echo esc_attr(get_the_author_meta('custom_info', $user->ID)); ?>"
                       class="regular-text"/><br/>
            </td>
        </tr>
        <?php if (esc_attr(get_the_author_meta('custom_info', $user->ID)) === 'company') { ?>
            <tr id="custom_user_field_row">
                <th>
                    <label for="company"><?php _e('Company', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="company" id="company"
                           value="<?php echo esc_attr(get_the_author_meta('company', $user->ID)); ?>"
                           class="regular-text"/><br/>

                </td>
            </tr>
             <tr id="custom_user_field_row">
                <th>
                    <label for="Country"><?php _e('Country', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="Country" id="Country"
                           value="<?php echo esc_attr(get_the_author_meta('Country', $user->ID)); ?>"
                           class="regular-text"/><br/>

                </td>
            </tr>
             <tr id="custom_user_field_row">
                <th>
                    <label for="Town"><?php _e('Town', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="Town" id="Town"
                           value="<?php echo esc_attr(get_the_author_meta('Town', $user->ID)); ?>"
                           class="regular-text"/><br/>

                </td>
            </tr>
             <tr id="custom_user_field_row">
                <th>
                    <label for="company_address"><?php _e('Company Address(', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="company_address" id="company_address"
                           value="<?php echo esc_attr(get_the_author_meta('company_address', $user->ID)); ?>"
                           class="regular-text"/><br/>

                </td>
            </tr>
             <tr id="custom_user_field_row">
                <th>
                    <label for="ZIP_Code"><?php _e('ZIP Code', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="ZIP_Code" id="ZIP_Code"
                           value="<?php echo esc_attr(get_the_author_meta('ZIP_Code', $user->ID)); ?>"
                           class="regular-text"/><br/>

                </td>
            </tr>
             <tr id="custom_user_field_row">
                <th>
                    <label for="Value_Added_Tax"><?php _e('Value Added Tax (VAT)', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="Value_Added_Tax" id="Value_Added_Tax"
                           value="<?php echo esc_attr(get_the_author_meta('Value_Added_Tax', $user->ID)); ?>"
                           class="regular-text"/><br/>

                </td>
            </tr>
             <tr id="custom_user_field_row">
                <th>
                    <label for="email"><?php _e('E-mail', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="email" id="email"
                           value="<?php echo esc_attr(get_the_author_meta('email', $user->ID)); ?>"
                           class="regular-text"/><br/>

                </td>
            </tr>
             <tr id="custom_user_field_row">
                <th>
                    <label for="Phone_Number"><?php _e('Phone Number', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="Phone_Number" id="Phone_Number"
                           value="<?php echo esc_attr(get_the_author_meta('Phone_Number', $user->ID)); ?>"
                           class="regular-text"/><br/>

                </td>
            </tr>








        <?php } elseif (esc_attr(get_the_author_meta('custom_info', $user->ID)) === 'individual') { ?>
            <tr id="custom_user_field_row">
                <th>
                    <label for="first_last_name"><?php _e('Individual', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="first_last_name" id="first_last_name"
                           value="<?php echo esc_attr(get_the_author_meta('first_last_name', $user->ID)); ?>"
                           class="regular-text"/><br/>

                </td>
            </tr>
            <tr id="custom_user_field_row">
                <th>
                    <label for="birthday"><?php _e('Birthdate', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="birthday" id="birthday"
                           value="<?php echo esc_attr(get_the_author_meta('birthday', $user->ID)); ?>"
                           class="regular-text"/><br/>

                </td>
            </tr>
            <tr id="custom_user_field_row">
                <th>
                    <label for="birth_place"><?php _e('Birthplace', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="birth_place" id="birth_place"
                           value="<?php echo esc_attr(get_the_author_meta('birth_place', $user->ID)); ?>"
                           class="regular-text"/><br/>

                </td>
            </tr>
            <tr id="custom_user_field_row">
                <th>
                    <label for="gender"><?php _e('Gender', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="gender" id="gender"
                           value="<?php echo esc_attr(get_the_author_meta('gender', $user->ID)); ?>"
                           class="regular-text"/><br/>
                </td>
            </tr>
            <tr id="custom_user_field_row">
                <th>
                    <label for="residence_address"><?php _e(' Residential address:', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="residence_address" id="residence_address"
                           value="<?php echo esc_attr(get_the_author_meta('residence_address', $user->ID)); ?>"
                           class="regular-text"/><br/>

                </td>
            </tr>


            <tr id="custom_user_field_row">
                <th>
                    <label for="residence_address"><?php _e(' Country', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="country" id="country"
                           value="<?php echo esc_attr(get_the_author_meta('country', $user->ID)); ?>"
                           class="regular-text"/><br/>

                </td>
            </tr>


            <tr id="custom_user_field_row">
                <th>
                    <label for="postal_code"><?php _e('Postal Code', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="postal_code" id="postal_code"
                           value="<?php echo esc_attr(get_the_author_meta('postal_code', $user->ID)); ?>"
                           class="regular-text"/><br/>

                </td>
            </tr>






            <tr id="custom_user_field_row">
                <th>
                    <label for="car_make_and_model"><?php _e('Brand and type of vehicle', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="car_make_and_model" id="car_make_and_model"
                           value="<?php echo esc_attr(get_the_author_meta('car_make_and_model', $user->ID)); ?>"
                           class="regular-text"/><br/>

                </td>
            </tr>
            <tr id="custom_user_field_row">
                <th>
                    <label for="car_color"><?php _e('Car color', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="car_color" id="car_color"
                           value="<?php echo esc_attr(get_the_author_meta('car_color', $user->ID)); ?>"
                           class="regular-text"/><br/>

                </td>
            </tr>
            <tr id="custom_user_field_row">
                <th>
                    <label for="want_to_clean"><?php _e(' What is the cleaning step would you like to better know?', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="want_to_clean" id="want_to_clean"
                           value="<?php echo esc_attr(get_the_author_meta('want_to_clean', $user->ID)); ?>"
                           class="regular-text"/><br/>

                </td>
            </tr>
            <tr id="custom_user_field_row">
                <th>
                    <label for="car_protection_wax"><?php _e('Wax to protect car', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="car_protection_wax" id="car_protection_wax"
                           value="<?php echo esc_attr(get_the_author_meta('car_protection_wax', $user->ID)); ?>"
                           class="regular-text"/><br/>

                </td>
            </tr>
            <tr id="custom_user_field_row">
                <th>
                    <label for="primo_marchio"><?php _e('Brand before the maniac line', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="primo_marchio" id="primo_marchio"
                           value="<?php echo esc_attr(get_the_author_meta('primo_marchio', $user->ID)); ?>"
                           class="regular-text"/><br/>

                </td>
            </tr>
            <tr id="custom_user_field_row">
                <th>
                    <label for="favorite_product"><?php _e('Favorite producti', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="favorite_product" id="favorite_product"
                           value="<?php echo esc_attr(get_the_author_meta('favorite_product', $user->ID)); ?>"
                           class="regular-text"/><br/>

                </td>
            </tr>
            <tr id="custom_user_field_row">
                <th>
                    <label for="used_car_body_products"><?php _e('Used car body products', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="used_car_body_products" id="used_car_body_products"
                           value="<?php echo esc_attr(get_the_author_meta('used_car_body_products', $user->ID)); ?>"
                           class="regular-text"/><br/>

                </td>
            </tr>

            <tr id="custom_user_field_row">
                <th>
                    <label for="car_care_money"><?php _e(' How much do you spend to take car of your car in a year?', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="car_care_money" id="car_care_money"
                           value="<?php echo esc_attr(get_the_author_meta('car_care_money', $user->ID)); ?>"
                           class="regular-text"/><br/>
                </td>
            </tr>
            <tr id="custom_user_field_row">
                <th>

                    <label for="number_of_car_washes"><?php _e(' How many times do you take your car to the carwash?(', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="number_of_car_washes" id="number_of_car_washes"
                           value="<?php echo esc_attr(get_the_author_meta('number_of_car_washes', $user->ID)); ?>"
                           class="regular-text"/><br/>
                </td>
            </tr>
            <tr id="custom_user_field_row">
                <th>
                    <label for="detailing"><?php _e('Do you know what detailing is?', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="detailing" id="detailing"
                           value="<?php echo esc_attr(get_the_author_meta('detailing', $user->ID)); ?>"
                           class="regular-text"/><br/>
                </td>
            </tr>
            <tr id="custom_user_field_row">
                <th>
                    <label for="vip_customer"><?php _e(' Do you think you should become a Maniac Line Vip Customer?', 'eduma'); ?></label>
                </th>
                <td>
                    <input type="text" name="vip_customer" id="vip_customer"
                           value="<?php echo esc_attr(get_the_author_meta('vip_customer', $user->ID)); ?>"
                           class="regular-text"/><br/>
                </td>
            </tr>
        <?php } ?>
    </table>
    <?php
}

//add action show form in profile page admin
add_action('show_user_profile', 'show_custom_register_form', 10, 1);
add_action('edit_user_profile', 'show_custom_register_form', 10, 1);

//add action save edit fields in user meta
add_action('personal_options_update', 'save_module_user_profile_fields');
add_action('edit_user_profile_update', 'save_module_user_profile_fields');

function save_module_user_profile_fields($user_id)
{

    if(empty($_POST['custom_info'])) {
        return;
    }

    $field_custom_info = LP_Helper::sanitize_params_submitted($_POST['custom_info']);

    if ($field_custom_info == "company") {
        if (!empty($_POST['company'])) {
            // update_user_meta($user_id, 'company', trim($_POST['company']));
                $fields_arr_company = array(
                'company',
                'Country',
                'Town',
                'company_address',
                'ZIP_Code',
                'Value_Added_Tax',
                'email',
                'Phone_Number',
                
            );
            foreach ($fields_arr_company as $field) {
                if(!empty($_POST[$field]) ) {
                    update_user_meta($user_id, $field, trim($_POST[$field]));
                }
            }
        }
    } elseif ($field_custom_info == "individual") {

        $fields_arr = array(
            'first_last_name',
            'birthday',
            'birth_place',
            'gender',
            'residence_address',
            'country',
            'postal_code',
            'car_make_and_model',
            'car_color',
            'want_to_clean',
            'car_protection_wax',
            'primo_marchio',
            'favorite_product',
            'used_car_body_products',
            'car_care_money',
            'number_of_car_washes',
            'detailing',
            'vip_customer',
        );
        foreach ($fields_arr as $field) {
            if(!empty($_POST[$field]) ) {
                update_user_meta($user_id, $field, trim($_POST[$field]));
            }
        }

    }
}

?>


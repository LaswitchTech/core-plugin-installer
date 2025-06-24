<!--
  Core Framework - View File

  @license    MIT (https://mit-license.org/)
  @author     Full Name <user@domain.com>
-->
<?php if(!$this->Config->get('application', 'installed')): ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title><?= $this->Locale->get($this->label()) ?></title>
            <script src="/js/jquery/js/jquery.min.js"></script>
            <?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'style.php'; ?>
        </head>
        <body>
            <div class="d-flex justify-content-center align-items-center vh-100 vw-100">
                <div class="d-flex flex-column justify-content-center align-items-center" style="padding: 2rem;">
                    <h1 class="text-center w-100"><?= $this->label() ?></h1>
                    <div>
                        <?php if(in_array('DATABASE',$this->call('modules'))): ?>
                            <div id="database" data-toggle="collapse" class="form-group collapse">
                                <label><h4><?= $this->Locale->get('Database') ?></h4></label>
                                <div class="input-wrapper">
                                    <div class="input">
                                        <select name="database_connector" placeholder="<?= $this->Locale->get('Connector') ?>" required>
                                            <option value="mysql" <?= ($this->Config->get('database','connector') == "mysql") ?? 'selected' ?>>MySQL</option>
                                        </select>
                                    </div>
                                    <div class="input"><input type="text" name="database_host" placeholder="<?= $this->Locale->get('Host') ?>" value="<?= $this->Config->get('database','host') ?? 'localhost' ?>" required></div>
                                    <div class="input"><input type="text" name="database_database" placeholder="<?= $this->Locale->get('Database') ?>" value="<?= $this->Config->get('database','database') ?? 'core' ?>" required></div>
                                    <div class="input"><input type="text" name="database_username" placeholder="<?= $this->Locale->get('Username') ?>" value="<?= $this->Config->get('database','username') ?? 'root' ?>" required></div>
                                    <div class="input"><input type="password" name="database_password" placeholder="<?= $this->Locale->get('Password') ?>" value="<?= $this->Config->get('database','password') ?? '' ?>" required></div>
                                    <div class="input"><input type="checkbox" name="database_sample" value="on" id="database_sample"><label for="database_sample"><?= $this->Locale->get('Import Sample Data') ?></label></div>
                                </div>
                                <div class="btn-group">
                                    <button type="button" data-target="previous"><?= $this->Locale->get('Return') ?></button>
                                    <button type="button" data-target="next"><?= $this->Locale->get('Continue') ?></button>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(in_array('SMTP',$this->call('modules'))): ?>
                            <div id="smtp" data-toggle="collapse" class="form-group collapse">
                                <label><h4><?= $this->Locale->get('SMTP') ?></h4></label>
                                <div class="input-wrapper">
                                    <div class="input"><input type="text" name="smtp_host" placeholder="<?= $this->Locale->get('Host') ?>" value="<?= $this->Config->get('smtp','host') ?? 'localhost' ?>" required></div>
                                    <div class="input"><input type="number" name="smtp_port" placeholder="<?= $this->Locale->get('Port') ?>" value="<?= $this->Config->get('smtp','port') ?? 465 ?>" required></div>
                                    <div class="input">
                                        <select name="smtp_encryption" placeholder="<?= $this->Locale->get('Encryption') ?>" required>
                                            <option value="ssl" <?= ($this->Config->get('smtp','encryption') == "ssl") ?? 'selected' ?>>SSL</option>
                                            <option value="tls" <?= ($this->Config->get('smtp','encryption') == "tls") ?? 'selected' ?>>TLS</option>
                                            <option value="none" <?= ($this->Config->get('smtp','encryption') == "none") ?? 'selected' ?>>None</option>
                                        </select>
                                    </div>
                                    <div class="input"><input type="email" name="smtp_username" placeholder="<?= $this->Locale->get('Username') ?>" value="<?= $this->Config->get('smtp','username') ?? '' ?>" required></div>
                                    <div class="input"><input type="password" name="smtp_password" placeholder="<?= $this->Locale->get('Password') ?>" value="<?= $this->Config->get('smtp','password') ?? '' ?>" required></div>
                                </div>
                                <div class="btn-group">
                                    <button type="button" data-target="previous"><?= $this->Locale->get('Return') ?></button>
                                    <button type="button" data-target="next"><?= $this->Locale->get('Continue') ?></button>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(in_array('IMAP',$this->call('modules'))): ?>
                            <div id="imap" data-toggle="collapse" class="form-group collapse">
                                <label><h4><?= $this->Locale->get('IMAP') ?></h4></label>
                                <div class="input-wrapper">
                                    <div class="input"><input type="text" name="imap_host" placeholder="<?= $this->Locale->get('Host') ?>" value="<?= $this->Config->get('imap','host') ?? 'localhost' ?>" required></div>
                                    <div class="input"><input type="number" name="imap_port" placeholder="<?= $this->Locale->get('Port') ?>" value="<?= $this->Config->get('imap','port') ?? 993 ?>" required></div>
                                    <div class="input"><input type="email" name="imap_username" placeholder="<?= $this->Locale->get('Username') ?>" value="<?= $this->Config->get('imap','username') ?? '' ?>" required></div>
                                    <div class="input"><input type="password" name="imap_password" placeholder="<?= $this->Locale->get('Password') ?>" value="<?= $this->Config->get('imap','password') ?? '' ?>" required></div>
                                </div>
                                <div class="btn-group">
                                    <button type="button" data-target="previous"><?= $this->Locale->get('Return') ?></button>
                                    <button type="button" data-target="next"><?= $this->Locale->get('Continue') ?></button>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(in_array('AUTH',$this->call('modules'))): ?>
                            <div id="identification" data-toggle="collapse" class="form-group collapse">
                                <label><h4><?= $this->Locale->get('Identification') ?></h4></label>
                                <div class="input-wrapper">
                                    <div class="input"><input type="text" name="identification_organization" placeholder="<?= $this->Locale->get('Organization') ?>" value="<?= $this->Config->get('application','owner') ?? '' ?>" required></div>
                                    <div class="input"><input type="email" name="identification_username" placeholder="<?= $this->Locale->get('Username') ?>" value="" required></div>
                                    <div class="input"><input type="password" name="identification_password" placeholder="<?= $this->Locale->get('Password') ?>" value="" required></div>
                                </div>
                                <div class="btn-group">
                                    <button type="button" data-target="previous"><?= $this->Locale->get('Return') ?></button>
                                    <button type="button" data-target="next"><?= $this->Locale->get('Continue') ?></button>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(in_array('INSTALLER',$this->call('modules'))): ?>
                            <div id="application" data-toggle="collapse" class="form-group collapse">
                                <label><h4><?= $this->Locale->get('Application Branding') ?></h4></label>
                                <div class="input-wrapper">
                                    <div class="input"><input type="text" name="application_name" placeholder="<?= $this->Locale->get('Brand') ?>" value="<?= $this->Config->get('application','name') ?? $this->Config->get('installer','name') ?>" required></div>
                                    <?php if(!in_array('AUTH',$this->call('modules'))): ?>
                                        <div class="input"><input type="text" name="application_owner" placeholder="<?= $this->Locale->get('Organization') ?>" value="<?= $this->Config->get('application','owner') ?? '' ?>" required></div>
                                    <?php endif; ?>
                                    <div class="input"><input type="number" name="application_copyright" placeholder="<?= $this->Locale->get('Copyright') ?>" value="<?= $this->Config->get('application','copyright') ?? date('Y') ?>" required></div>
                                </div>
                                <div class="btn-group">
                                    <button type="button" data-target="previous"><?= $this->Locale->get('Return') ?></button>
                                    <button type="button" data-target="next"><?= $this->Locale->get('Continue') ?></button>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div id="validation" data-toggle="collapse" class="form-group collapse">
                            <label><h4><?= $this->Locale->get('Validation') ?></h4></label>
                            <div class="row">
                                <?php if(in_array('DATABASE',$this->call('modules'))): ?>
                                    <div class="col container-group">
                                        <label data-target="database"><?= $this->Locale->get('Database') ?></label>
                                        <div>
                                            <strong><?= $this->Locale->get('Connector') ?></strong>
                                            <span class="float-end" data-field="database_connector"></span>
                                        </div>
                                        <div>
                                            <strong><?= $this->Locale->get('Host') ?></strong>
                                            <span class="float-end" data-field="database_host"></span>
                                        </div>
                                        <div>
                                            <strong><?= $this->Locale->get('Database') ?></strong>
                                            <span class="float-end" data-field="database_database"></span>
                                        </div>
                                        <div>
                                            <strong><?= $this->Locale->get('Username') ?></strong>
                                            <span class="float-end" data-field="database_username"></span>
                                        </div>
                                        <div>
                                            <strong><?= $this->Locale->get('Password') ?></strong>
                                            <span class="float-end" data-field="database_password"></span>
                                        </div>
                                        <div>
                                            <strong><?= $this->Locale->get('Sample Data') ?></strong>
                                            <span class="float-end" data-field="database_sample"></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('SMTP',$this->call('modules'))): ?>
                                    <div class="col container-group">
                                        <label data-target="smtp"><?= $this->Locale->get('SMTP') ?></label>
                                        <div>
                                            <strong><?= $this->Locale->get('Host') ?></strong>
                                            <span class="float-end" data-field="smtp_host"></span>
                                        </div>
                                        <div>
                                            <strong><?= $this->Locale->get('Port') ?></strong>
                                            <span class="float-end" data-field="smtp_port"></span>
                                        </div>
                                        <div>
                                            <strong><?= $this->Locale->get('Encryption') ?></strong>
                                            <span class="float-end" data-field="smtp_encryption"></span>
                                        </div>
                                        <div>
                                            <strong><?= $this->Locale->get('Username') ?></strong>
                                            <span class="float-end" data-field="smtp_username"></span>
                                        </div>
                                        <div>
                                            <strong><?= $this->Locale->get('Password') ?></strong>
                                            <span class="float-end" data-field="smtp_password"></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('IMAP',$this->call('modules'))): ?>
                                    <div class="col container-group">
                                        <label data-target="imap"><?= $this->Locale->get('IMAP') ?></label>
                                        <div>
                                            <strong><?= $this->Locale->get('Host') ?></strong>
                                            <span class="float-end" data-field="imap_host"></span>
                                        </div>
                                        <div>
                                            <strong><?= $this->Locale->get('Port') ?></strong>
                                            <span class="float-end" data-field="imap_port"></span>
                                        </div>
                                        <div>
                                            <strong><?= $this->Locale->get('Username') ?></strong>
                                            <span class="float-end" data-field="imap_username"></span>
                                        </div>
                                        <div>
                                            <strong><?= $this->Locale->get('Password') ?></strong>
                                            <span class="float-end" data-field="imap_password"></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('AUTH',$this->call('modules'))): ?>
                                    <div class="col container-group">
                                        <label data-target="identification"><?= $this->Locale->get('Identification') ?></label>
                                        <div>
                                            <strong><?= $this->Locale->get('Organization') ?></strong>
                                            <span class="float-end" data-field="identification_organization"></span>
                                        </div>
                                        <div>
                                            <strong><?= $this->Locale->get('Username') ?></strong>
                                            <span class="float-end" data-field="identification_username"></span>
                                        </div>
                                        <div>
                                            <strong><?= $this->Locale->get('Password') ?></strong>
                                            <span class="float-end" data-field="identification_password"></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(in_array('INSTALLER',$this->call('modules'))): ?>
                                    <div class="col container-group">
                                        <label data-target="application"><?= $this->Locale->get('Application Branding') ?></label>
                                        <div>
                                            <strong><?= $this->Locale->get('Name') ?></strong>
                                            <span class="float-end" data-field="application_name"></span>
                                        </div>
                                        <?php if(!in_array('AUTH',$this->call('modules'))): ?>
                                            <div>
                                                <strong><?= $this->Locale->get('Organization') ?></strong>
                                                <span class="float-end" data-field="application_owner"></span>
                                            </div>
                                        <?php endif; ?>
                                        <div>
                                            <strong><?= $this->Locale->get('Copyright') ?></strong>
                                            <span class="float-end" data-field="application_copyright"></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="btn-group">
                                <button type="button" data-target="installation"><?= $this->Locale->get('Install') ?></button>
                            </div>
                        </div>
                        <div id="installation" data-toggle="collapse" class="form-group collapse">
                            <div class="spinner"></div>
                        </div>
                    </div>
                </div>
            </div>
        </body>

        <script>

            // Set CSRF Token
            var CSRF_KEY = "<?= $this->CSRF->key() ?>";
            var CSRF_TOKEN = "<?= $this->CSRF->token() ?>";

            // Wait for document to load
            $(document).ready(function(){

                // Open the first Collapse
                setTimeout(() => {
                    $('[data-toggle="collapse"]').first().addClass('show').find('[data-target="previous"]').remove();
                }, 100);

                // Add the click event for the collapsibles
                $('[data-target]').click(function(e){
                    e.preventDefault();
                    var button = $(this);
                    var target = $(this).data('target');
                    switch(target){
                        case 'previous':
                            $('[data-toggle="collapse"]').removeClass('show');
                            setTimeout(() => {
                                button.parents('[data-toggle="collapse"]').prev().addClass('show');
                            }, 1000);
                            break;
                        case 'next':
                            var valid = true;
                            button.parents('[data-toggle="collapse"]').find('input[required]').each(function(){

                                // Initialize validation
                                var validation = true;

                                // Reset Error
                                $(this).parents('.input').removeClass('error');

                                // Validate Empty
                                if($(this).val() == ""){
                                    validation = false;
                                }

                                // Validate Email
                                if($(this).attr('type') == 'email'){
                                    var email = $(this).val();
                                    var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                                    if(!pattern.test(email)){
                                        validation = false;
                                    }
                                }
                                if(!validation){
                                    $(this).parents('.input').addClass('error');
                                    valid = false;
                                }
                            });

                            // Check if valid
                            if(valid){
                                $('[data-toggle="collapse"]').removeClass('show');
                                setTimeout(() => {
                                    button.parents('[data-toggle="collapse"]').next().addClass('show');
                                }, 1000);
                            }
                            break;
                        default:
                            $('[data-toggle="collapse"]').removeClass('show');
                            setTimeout(() => {
                                $('#' + target).addClass('show');
                            }, 1000);
                            break;
                    }
                });

                // Refresh the validation data
                $('button[data-target="next"]').last().click(function(e){
                    $('[data-field]').each(function(){
                        var name = $(this).data('field');
                        var field = $('[name="' + name + '"]');
                        var type = field.attr('type');
                        var value = field.val();
                        switch(type){
                            case 'password':
                                $(this).text(value.replace(/./g, '*'));
                                break;
                            case 'checkbox':
                                $(this).text(field.is(':checked') ? "<?= $this->Locale->get("Yes") ?>" : "<?= $this->Locale->get("No") ?>");
                                break;
                            default:
                                $(this).text(value);
                                break;
                        }
                    });
                });

                // Start Installation
                $('button[data-target="installation"]').click(function(e){

                    // Reset the installation status indicator
                    $('#installation').children().first().removeClass('spinner-100').addClass('spinner-25').text('');

                    // Wait for the animation to complete
                    setTimeout(() => {

                        // Install the database module
                        <?php if(in_array('DATABASE',$this->call('modules'))): ?>

                            // Create function
                            function installDatabase() {

                                // Create a promise
                                return new Promise((resolve, reject) => {

                                    // Try & Catch
                                    try {

                                        // Retrieve the form data
                                        var data = {
                                            module: 'DATABASE',
                                            connector: $('[name="database_connector"]').val(),
                                            host: $('[name="database_host"]').val(),
                                            database: $('[name="database_database"]').val(),
                                            username: $('[name="database_username"]').val(),
                                            password: $('[name="database_password"]').val(),
                                            sample: $('[name="database_sample"]').is(':checked')
                                        };

                                        // Add the CSRF Token
                                        data[CSRF_KEY] = CSRF_TOKEN;

                                        // Start the installation
                                        $.ajax({
                                            url: '/endpoint.php/installer/install',
                                            type: 'POST',dataType: 'json',
                                            data: data,
                                            success: function(response) {
                                                console.log(response);

                                                // Update the CSRF
                                                CSRF_KEY = response.CSRF.key;
                                                CSRF_TOKEN = response.CSRF.token;

                                                // Resolve the promise
                                                resolve();
                                            }
                                        });
                                    } catch (error) {

                                        // Reject the promise
                                        reject(error);
                                    }
                                });
                            }
                        <?php endif; ?>

                        // Install the smtp module
                        <?php if(in_array('SMTP',$this->call('modules'))): ?>

                            // Create function
                            function installSMTP() {

                                // Create a promise
                                return new Promise((resolve, reject) => {

                                    // Try & Catch
                                    try {

                                        // Retrieve the form data
                                        var data = {
                                            module: 'SMTP',
                                            host: $('[name="smtp_host"]').val(),
                                            port: $('[name="smtp_port"]').val(),
                                            encryption: $('[name="smtp_encryption"]').val(),
                                            username: $('[name="smtp_username"]').val(),
                                            password: $('[name="smtp_password"]').val()
                                        };

                                        // Add the CSRF Token
                                        data[CSRF_KEY] = CSRF_TOKEN;

                                        // Start the installation
                                        $.ajax({
                                            url: '/endpoint.php/installer/install',
                                            type: 'POST',dataType: 'json',
                                            data: data,
                                            success: function(response) {
                                                console.log(response);

                                                // Update the CSRF
                                                CSRF_KEY = response.CSRF.key;
                                                CSRF_TOKEN = response.CSRF.token;

                                                // Resolve the promise
                                                resolve();
                                            }
                                        });
                                    } catch (error) {

                                        // Reject the promise
                                        reject(error);
                                    }
                                });
                            }
                        <?php endif; ?>

                        // Install the imap module
                        <?php if(in_array('IMAP',$this->call('modules'))): ?>

                            // Create function
                            function installIMAP() {

                                // Create a promise
                                return new Promise((resolve, reject) => {

                                    // Try & Catch
                                    try {

                                        // Retrieve the form data
                                        var data = {
                                            module: 'IMAP',
                                            host: $('[name="imap_host"]').val(),
                                            port: $('[name="imap_port"]').val(),
                                            username: $('[name="imap_username"]').val(),
                                            password: $('[name="imap_password"]').val()
                                        };

                                        // Add the CSRF Token
                                        data[CSRF_KEY] = CSRF_TOKEN;

                                        // Start the installation
                                        $.ajax({
                                            url: '/endpoint.php/installer/install',
                                            type: 'POST',dataType: 'json',
                                            data: data,
                                            success: function(response) {
                                                console.log(response);

                                                // Update the CSRF
                                                CSRF_KEY = response.CSRF.key;
                                                CSRF_TOKEN = response.CSRF.token;

                                                // Resolve the promise
                                                resolve();
                                            }
                                        });
                                    } catch (error) {

                                        // Reject the promise
                                        reject(error);
                                    }
                                });
                            }
                        <?php endif; ?>

                        // Install the auth module
                        <?php if(in_array('AUTH',$this->call('modules'))): ?>

                            // Create function
                            function installAuth() {

                                // Create a promise
                                return new Promise((resolve, reject) => {

                                    // Try & Catch
                                    try {

                                        // Retrieve the form data
                                        var data = {
                                            module: 'AUTH',
                                            organization: $('[name="identification_organization"]').val(),
                                            username: $('[name="identification_username"]').val(),
                                            password: $('[name="identification_password"]').val()
                                        };

                                        // Add the CSRF Token
                                        data[CSRF_KEY] = CSRF_TOKEN;

                                        // Start the installation
                                        $.ajax({
                                            url: '/endpoint.php/installer/install',
                                            type: 'POST',dataType: 'json',
                                            data: data,
                                            success: function(response) {
                                                console.log(response);

                                                // Update the CSRF
                                                CSRF_KEY = response.CSRF.key;
                                                CSRF_TOKEN = response.CSRF.token;

                                                // Resolve the promise
                                                resolve();
                                            }
                                        });
                                    } catch (error) {

                                        // Reject the promise
                                        reject(error);
                                    }
                                });
                            }
                        <?php endif; ?>

                        // Install the style module
                        <?php if(in_array('INSTALLER',$this->call('modules'))): ?>

                            // Create function
                            function installApplication() {

                                // Create a promise
                                return new Promise((resolve, reject) => {

                                    // Try & Catch
                                    try {

                                        // Retrieve the form data
                                        var data = {
                                            module: 'INSTALLER',
                                            name: $('[name="application_name"]').val(),
                                            copyright: $('[name="application_copyright"]').val(),
                                            owner: $('[name="application_owner"]').val()
                                        };
                                        <?php if(in_array('AUTH',$this->call('modules'))): ?>
                                            data.owner = $('[name="identification_organization"]').val();
                                        <?php endif; ?>

                                        // Add the CSRF Token
                                        data[CSRF_KEY] = CSRF_TOKEN;

                                        console.log(data);

                                        // Start the installation
                                        $.ajax({
                                            url: '/endpoint.php/installer/install',
                                            type: 'POST',dataType: 'json',
                                            data: data,
                                            success: function(response) {
                                                console.log(response);

                                                // Update the CSRF
                                                CSRF_KEY = response.CSRF.key;
                                                CSRF_TOKEN = response.CSRF.token;

                                                // Resolve the promise
                                                resolve();
                                            }
                                        });
                                    } catch (error) {

                                        // Reject the promise
                                        reject(error);
                                    }
                                });
                            }
                        <?php endif; ?>

                        // Execute the promises sequentially
                        (async function run() {
                            try {

                                // Execute the promises sequentially
                                <?php if(in_array('DATABASE',$this->call('modules'))): ?>
                                    await installDatabase();
                                <?php endif; ?>
                                <?php if(in_array('SMTP',$this->call('modules'))): ?>
                                    await installSMTP();
                                <?php endif; ?>
                                <?php if(in_array('IMAP',$this->call('modules'))): ?>
                                    await installIMAP();
                                <?php endif; ?>
                                <?php if(in_array('AUTH',$this->call('modules'))): ?>
                                    await installAuth();
                                <?php endif; ?>
                                <?php if(in_array('INSTALLER',$this->call('modules'))): ?>
                                    await installApplication();
                                <?php endif; ?>

                                // At this point, all awaited promises above have resolved (no errors).
                                console.log("done");

                                // Redirect to the home page after spinner spinner-100 of 5 seconds
                                $('#installation').children().first().removeClass('spinner-25').addClass('spinner-100').text('5');
                                var count = 5;
                                var interval = setInterval(() => {
                                    count--;
                                    $('.spinner.spinner-100').text(count);
                                    if(count == 0){
                                        clearInterval(interval);
                                        window.location.href = '/';
                                    }
                                }, 1000);
                            } catch (err) {

                                // Log any error
                                console.error("An error occurred:", err);
                            }
                        })();
                    }, 1000);
                });
            });
        </script>
    </html>
<?php else: $this->interrupt(); $this->Router->render('404'); endif; ?>

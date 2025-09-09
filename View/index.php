<?php if(!$this->Config->get('application', 'installed')): ?>
    <article id="layout"></article>
    <script>
        // Wait for the DOM to be fully loaded before executing the script
        document.addEventListener('DOMContentLoaded', () => {
            (() => {

                // Create an steps dictionary
                const Steps = {};

                // Create an array of promises
                const Promises = {
                    modules: [],
                    extensions: [],
                    application: [],
                };

                // Create a page tracker
                var Current = null;

                // Create a div and append to layout
                const Layout = $(document.createElement('div')).addClass('installer').appendTo('#layout');
                Layout.card = $(document.createElement('div')).addClass('card card-body px-4 shadow').appendTo(Layout);
                Layout.title = $(document.createElement('h1')).html('<?= $this->Locale->get("Installation Wizard") ?>').appendTo(Layout.card);

                // Create the Stepper
                builder.Component(
                    'stepper',
                    Layout.card,
                    {
                        class: {
                            control: 'rounded-pill',
                        },
                    },
                    function(stepper, component){

                        // Database
                        <?php if(in_array('DATABASE',$this->call('core'))): ?>
                            stepper.add(
                                {
                                    'icon': 'database',
                                },
                                function(step){

                                    // Set the step name
                                    step.name = 'database';

                                    // Remove the click event to prevent skipping steps
                                    step.control.attr('data-bs-toggle',null).mobile.btn.attr('data-bs-toggle',null);

                                    // Handle the collapse events to update the step control
                                    step.content.on('show.bs.collapse', function () {
                                        current = step.name;
                                        step.control.html('<i class="bi bi-database me-2"></i><?= $this->Locale->get("Database") ?>');
                                    });
                                    step.content.on('hide.bs.collapse', function () {
                                        step.control.html('<i class="bi bi-database"></i>');
                                    });

                                    // Styling
                                    step.content.addClass('p-5');

                                    // Create a form
                                    step.form = builder.Utility(
                                        'form',
                                        step.content,
                                        {
                                            class:{
                                                component: 'row g-3 m-0',
                                            },
                                            callback: {
                                                val: function(values){
                                                    values.module = 'DATABASE';
                                                    return values;
                                                },
                                            },
                                        },
                                        function(form, component){

                                            // connector
                                            form.add(
                                                'select',
                                                {
                                                    name: 'connector',
                                                    label: builder.Locale.get('Connector'),
                                                    placeholder: builder.Locale.get('Select a connector'),
                                                    style: 'floating',
                                                    value: 'mysql',
                                                    options: [
                                                        {id: 'mysql', text: 'MySQL'},
                                                    ],
                                                    required: true,
                                                    class: {
                                                        component: 'col-12',
                                                    },
                                                }
                                            );

                                            // host
                                            form.add(
                                                'text',
                                                {
                                                    name: 'host',
                                                    label: builder.Locale.get('Host'),
                                                    placeholder: builder.Locale.get('Enter host'),
                                                    style: 'floating',
                                                    value: "<?= $this->Config->get('database','host') ?? 'localhost' ?>",
                                                    required: true,
                                                    class: {
                                                        component: 'col-12',
                                                    },
                                                }
                                            );

                                            // database
                                            form.add(
                                                'text',
                                                {
                                                    name: 'database',
                                                    label: builder.Locale.get('Database'),
                                                    placeholder: builder.Locale.get('Enter database'),
                                                    style: 'floating',
                                                    value: "<?= $this->Config->get('database','database') ?? 'core' ?>",
                                                    required: true,
                                                    class: {
                                                        component: 'col-12',
                                                    },
                                                }
                                            );

                                            // username
                                            form.add(
                                                'text',
                                                {
                                                    name: 'username',
                                                    label: builder.Locale.get('Username'),
                                                    placeholder: builder.Locale.get('Enter username'),
                                                    style: 'floating',
                                                    value: "<?= $this->Config->get('database','username') ?? 'root' ?>",
                                                    required: true,
                                                    class: {
                                                        component: 'col-12',
                                                    },
                                                }
                                            );

                                            // password
                                            form.add(
                                                'password',
                                                {
                                                    name: 'password',
                                                    label: builder.Locale.get('Password'),
                                                    placeholder: builder.Locale.get('Enter password'),
                                                    style: 'floating',
                                                    value: "<?= $this->Config->get('database','password') ?? '' ?>",
                                                    required: true,
                                                    class: {
                                                        component: 'col-12',
                                                    },
                                                }
                                            );

                                            // sample
                                            form.add(
                                                'switch',
                                                {
                                                    name: 'sample',
                                                    label: builder.Locale.get('Import Sample Data'),
                                                    style: 'floating',
                                                    class: {
                                                        component: 'col-12',
                                                    },
                                                }
                                            );
                                        },
                                    );

                                    // Add a promise to the promises array
                                    Promises.modules.push(function(label, spinner, length = 0, key = 0){
                                        return new Promise((resolve, reject) => {

                                            // Try & Catch
                                            try {

                                                // Update the label
                                                label.text("<?= $this->Locale->get('Configuring and Creating Database...') ?>");

                                                // Start the installation
                                                $.ajax({
                                                    url: '/api/installer/install',
                                                    headers: {'X-CSRF-Authorization': CSRF_KEY},
                                                    type: 'POST',dataType: 'json',
                                                    data: step.form.val(),
                                                    error: function(xhr, status, error) {
                                                        spinner.removeClass('spinner-border').addClass('rounded-circle border border-4 border-danger').html('<i class="bi bi-x-lg"></i>');
                                                        label.text("<?= $this->Locale->get('Error configuring or creating database!') ?>").css('color', 'red');
                                                        reject(new Error(xhr.responseJSON.message ?? error));
                                                    },
                                                    success: function(response) {
                                                        label.text("<?= $this->Locale->get('Database Configured and Created Successfully.') ?>");
                                                        resolve();
                                                    }
                                                });
                                            } catch (error) {
                                                reject(error);
                                            }
                                        });
                                    });

                                    // Store the step for later use
                                    Steps.database = step;
                                }
                            );
                        <?php endif; ?>

                        // SMTP
                        <?php if(in_array('SMTP',$this->call('core'))): ?>
                            stepper.add(
                                {
                                    'icon': 'send',
                                },
                                function(step){

                                    // Set the step name
                                    step.name = 'SMTP';

                                    // Remove the click event to prevent skipping steps
                                    step.control.attr('data-bs-toggle',null).mobile.btn.attr('data-bs-toggle',null);

                                    // Handle the collapse events to update the step control
                                    step.content.on('show.bs.collapse', function () {
                                        current = step.name;
                                        step.control.html('<i class="bi bi-send me-2"></i><?= $this->Locale->get("SMTP") ?>');
                                    });
                                    step.content.on('hide.bs.collapse', function () {
                                        step.control.html('<i class="bi bi-send"></i>');
                                    });

                                    // Styling
                                    step.content.addClass('p-5');

                                    // Create a form
                                    step.form = builder.Utility(
                                        'form',
                                        step.content,
                                        {
                                            class:{
                                                component: 'row g-3 m-0',
                                            },
                                            callback: {
                                                val: function(values){
                                                    values.module = 'SMTP';
                                                    return values;
                                                },
                                            },
                                        },
                                        function(form, component){

                                            // host
                                            form.add(
                                                'text',
                                                {
                                                    name: 'host',
                                                    label: builder.Locale.get('Host'),
                                                    placeholder: builder.Locale.get('Enter host'),
                                                    style: 'floating',
                                                    value: "<?= $this->Config->get('smtp','host') ?? 'localhost' ?>",
                                                    required: true,
                                                    class: {
                                                        component: 'col-12',
                                                    },
                                                }
                                            );

                                            // port
                                            form.add(
                                                'number',
                                                {
                                                    name: 'port',
                                                    label: builder.Locale.get('Port'),
                                                    placeholder: builder.Locale.get('Enter a port number'),
                                                    style: 'floating',
                                                    value: <?= $this->Config->get('smtp','port') ?? 465 ?>,
                                                    required: true,
                                                    class: {
                                                        component: 'col-12',
                                                    },
                                                }
                                            );

                                            // encryption
                                            form.add(
                                                'select',
                                                {
                                                    name: 'encryption',
                                                    label: builder.Locale.get('Encryption'),
                                                    placeholder: builder.Locale.get('Select encryption'),
                                                    style: 'floating',
                                                    value: "<?= $this->Config->get('smtp','encryption') ?? 'ssl' ?>",
                                                    options: [
                                                        {id: 'ssl', text: 'SSL'},
                                                        {id: 'tls', text: 'TLS'},
                                                        {id: 'none', text: 'None'},
                                                    ],
                                                    required: true,
                                                    class: {
                                                        component: 'col-12',
                                                    },
                                                }
                                            );

                                            // username
                                            form.add(
                                                'text',
                                                {
                                                    name: 'username',
                                                    label: builder.Locale.get('Username'),
                                                    placeholder: builder.Locale.get('Enter username'),
                                                    style: 'floating',
                                                    value: "<?= $this->Config->get('smtp','username') ?? '' ?>",
                                                    required: true,
                                                    class: {
                                                        component: 'col-12',
                                                    },
                                                }
                                            );

                                            // password
                                            form.add(
                                                'password',
                                                {
                                                    name: 'password',
                                                    label: builder.Locale.get('Password'),
                                                    placeholder: builder.Locale.get('Enter password'),
                                                    style: 'floating',
                                                    value: "<?= $this->Config->get('smtp','password') ?? '' ?>",
                                                    required: true,
                                                    class: {
                                                        component: 'col-12',
                                                    },
                                                }
                                            );
                                        },
                                    );

                                    // Add a promise to the promises array
                                    Promises.modules.push(function(label, spinner, length = 0, key = 0){
                                        return new Promise((resolve, reject) => {

                                            // Try & Catch
                                            try {

                                                // Update the label
                                                label.text("<?= $this->Locale->get('Configuring SMTP Server...') ?>");

                                                // Start the installation
                                                $.ajax({
                                                    url: '/api/installer/install',
                                                    headers: {'X-CSRF-Authorization': CSRF_KEY},
                                                    type: 'POST',dataType: 'json',
                                                    data: step.form.val(),
                                                    error: function(xhr, status, error) {
                                                        spinner.removeClass('spinner-border').addClass('rounded-circle border border-4 border-danger').html('<i class="bi bi-x-lg"></i>');
                                                        label.text("<?= $this->Locale->get('Error configuring SMTP server!') ?>").css('color', 'red');
                                                        reject(new Error(xhr.responseJSON.message ?? error));
                                                    },
                                                    success: function(response) {
                                                        label.text("<?= $this->Locale->get('SMTP service configured!') ?>");
                                                        resolve();
                                                    }
                                                });
                                            } catch (error) {
                                                reject(error);
                                            }
                                        });
                                    });

                                    // Store the step for later use
                                    Steps.smtp = step;
                                }
                            );
                        <?php endif; ?>

                        // IMAP
                        <?php if(in_array('IMAP',$this->call('core'))): ?>
                            stepper.add(
                                {
                                    'icon': 'inbox',
                                },
                                function(step){

                                    // Set the step name
                                    step.name = 'IMAP';

                                    // Remove the click event to prevent skipping steps
                                    step.control.attr('data-bs-toggle',null).mobile.btn.attr('data-bs-toggle',null);

                                    // Handle the collapse events to update the step control
                                    step.content.on('show.bs.collapse', function () {
                                        current = step.name;
                                        step.control.html('<i class="bi bi-inbox me-2"></i><?= $this->Locale->get("IMAP") ?>');
                                    });
                                    step.content.on('hide.bs.collapse', function () {
                                        step.control.html('<i class="bi bi-inbox"></i>');
                                    });

                                    // Styling
                                    step.content.addClass('p-5');

                                    // Create a form
                                    step.form = builder.Utility(
                                        'form',
                                        step.content,
                                        {
                                            class:{
                                                component: 'row g-3 m-0',
                                            },
                                            callback: {
                                                val: function(values){
                                                    values.module = 'IMAP';
                                                    return values;
                                                },
                                            },
                                        },
                                        function(form, component){

                                            // host
                                            form.add(
                                                'text',
                                                {
                                                    name: 'host',
                                                    label: builder.Locale.get('Host'),
                                                    placeholder: builder.Locale.get('Enter host'),
                                                    style: 'floating',
                                                    value: "<?= $this->Config->get('imap','host') ?? 'localhost' ?>",
                                                    required: true,
                                                    class: {
                                                        component: 'col-12',
                                                    },
                                                }
                                            );

                                            // port
                                            form.add(
                                                'number',
                                                {
                                                    name: 'port',
                                                    label: builder.Locale.get('Port'),
                                                    placeholder: builder.Locale.get('Enter a port number'),
                                                    style: 'floating',
                                                    value: <?= $this->Config->get('imap','port') ?? 993 ?>,
                                                    required: true,
                                                    class: {
                                                        component: 'col-12',
                                                    },
                                                }
                                            );

                                            // encryption
                                            form.add(
                                                'select',
                                                {
                                                    name: 'encryption',
                                                    label: builder.Locale.get('Encryption'),
                                                    placeholder: builder.Locale.get('Select encryption'),
                                                    style: 'floating',
                                                    value: "<?= $this->Config->get('imap','encryption') ?? 'ssl' ?>",
                                                    options: [
                                                        {id: 'ssl', text: 'SSL'},
                                                        {id: 'tls', text: 'TLS'},
                                                        {id: 'none', text: 'None'},
                                                    ],
                                                    required: true,
                                                    class: {
                                                        component: 'col-12',
                                                    },
                                                }
                                            );

                                            // username
                                            form.add(
                                                'text',
                                                {
                                                    name: 'username',
                                                    label: builder.Locale.get('Username'),
                                                    placeholder: builder.Locale.get('Enter username'),
                                                    style: 'floating',
                                                    value: "<?= $this->Config->get('imap','username') ?? '' ?>",
                                                    required: true,
                                                    class: {
                                                        component: 'col-12',
                                                    },
                                                }
                                            );

                                            // password
                                            form.add(
                                                'password',
                                                {
                                                    name: 'password',
                                                    label: builder.Locale.get('Password'),
                                                    placeholder: builder.Locale.get('Enter password'),
                                                    style: 'floating',
                                                    value: "<?= $this->Config->get('imap','password') ?? '' ?>",
                                                    required: true,
                                                    class: {
                                                        component: 'col-12',
                                                    },
                                                }
                                            );
                                        },
                                    );

                                    // Add a promise to the promises array
                                    Promises.modules.push(function(label, spinner, length = 0, key = 0){
                                        return new Promise((resolve, reject) => {

                                            // Try & Catch
                                            try {

                                                // Update the label
                                                label.text("<?= $this->Locale->get('Configuring IMAP Server...') ?>");

                                                // Start the installation
                                                $.ajax({
                                                    url: '/api/installer/install',
                                                    headers: {'X-CSRF-Authorization': CSRF_KEY},
                                                    type: 'POST',dataType: 'json',
                                                    data: step.form.val(),
                                                    error: function(xhr, status, error) {
                                                        spinner.removeClass('spinner-border').addClass('rounded-circle border border-4 border-danger').html('<i class="bi bi-x-lg"></i>');
                                                        label.text("<?= $this->Locale->get('Error configuring IMAP server!') ?>").css('color', 'red');
                                                        reject(new Error(xhr.responseJSON.message ?? error));
                                                    },
                                                    success: function(response) {
                                                        label.text("<?= $this->Locale->get('IMAP service configured!') ?>");
                                                        resolve();
                                                    }
                                                });
                                            } catch (error) {
                                                reject(error);
                                            }
                                        });
                                    });

                                    // Store the step for later use
                                    Steps.imap = step;
                                }
                            );
                        <?php endif; ?>

                        // Extensions
                        <?php if(!empty($this->call('modules')) || !empty($this->call('plugins')) || !empty($this->call('themes'))): ?>

                            // AJAX Request
                            $.ajax({
                                url: '/api/installer/required',
                                headers: {'X-CSRF-Authorization': CSRF_KEY},
                                type: 'GET',dataType: 'json',
                                error: function(xhr, status, error) {
                                    console.error('Error retrieving required extensions:', error);
                                    reject(error);
                                },
                                success: function(response) {

                                    // Loop through the records
                                    for(const [type, extensions] of Object.entries(response)){
                                        if(['modules','plugins','themes'].includes(type)){
                                            for(const [key, extension] of Object.entries(extensions)){

                                                // Add a promise to the promises array
                                                Promises.extensions.push(function(label, spinner, length = 0, key = 0){
                                                    return new Promise((resolve, reject) => {

                                                        // Try & Catch
                                                        try {

                                                            // Update the label
                                                            label.text("<?= $this->Locale->get('Installing Required Extensions') ?> ("+type+":"+extension+")... (" + key + " of " + length + ")");

                                                            // AJAX Request
                                                            $.ajax({
                                                                url: '/api/extensions/install?type='+type+'&base='+extension,
                                                                headers: {'X-CSRF-Authorization': CSRF_KEY},
                                                                type: 'GET',dataType: 'json',
                                                                error: function(xhr, status, error) {
                                                                    console.error('Error installing this extension:', error);
                                                                    spinner.removeClass('spinner-border').addClass('rounded-circle border border-4 border-danger').html('<i class="bi bi-x-lg"></i>');
                                                                    label.text("<?= $this->Locale->get('Error Installing Extension') ?> ("+type+":"+extension+")...").css('color', 'red');
                                                                    reject(error);
                                                                },
                                                                success: function(response) {

                                                                    // Resolve the promise
                                                                    resolve();
                                                                },
                                                            });
                                                        } catch (error) {
                                                            reject(error);
                                                        }
                                                    });
                                                });
                                            }
                                        }
                                    }
                                },
                            });
                        <?php endif; ?>

                        // Identification
                        <?php if(in_array('AUTH',$this->call('core'))): ?>
                            stepper.add(
                                {
                                    'icon': 'shield-lock',
                                },
                                function(step){

                                    // Set the step name
                                    step.name = 'identification';

                                    // Remove the click event to prevent skipping steps
                                    step.control.attr('data-bs-toggle',null).mobile.btn.attr('data-bs-toggle',null);

                                    // Handle the collapse events to update the step control
                                    step.content.on('show.bs.collapse', function () {
                                        current = step.name;
                                        step.control.html('<i class="bi bi-shield-lock me-2"></i><?= $this->Locale->get("Identification") ?>');
                                    });
                                    step.content.on('hide.bs.collapse', function () {
                                        step.control.html('<i class="bi bi-shield-lock"></i>');
                                    });

                                    // Styling
                                    step.content.addClass('p-5');

                                    // Create a form
                                    step.form = builder.Utility(
                                        'form',
                                        step.content,
                                        {
                                            class:{
                                                component: 'row g-3 m-0',
                                            },
                                            callback: {
                                                val: function(values){
                                                    values.module = 'AUTH';
                                                    return values;
                                                },
                                            },
                                        },
                                        function(form, component){

                                            // organization
                                            form.add(
                                                'text',
                                                {
                                                    name: 'organization',
                                                    label: builder.Locale.get('Organization'),
                                                    placeholder: builder.Locale.get('Enter organization'),
                                                    style: 'floating',
                                                    value: "<?= $this->Config->get('application','owner') ?? ($this->Config->get('installer','owner') ?? '') ?>",
                                                    required: true,
                                                    class: {
                                                        component: 'col-12',
                                                    },
                                                }
                                            );

                                            // username
                                            form.add(
                                                'text',
                                                {
                                                    name: 'username',
                                                    label: builder.Locale.get('Username'),
                                                    placeholder: builder.Locale.get('Enter username'),
                                                    style: 'floating',
                                                    required: true,
                                                    class: {
                                                        component: 'col-12',
                                                    },
                                                }
                                            );

                                            // password
                                            form.add(
                                                'password',
                                                {
                                                    name: 'password',
                                                    label: builder.Locale.get('Password'),
                                                    placeholder: builder.Locale.get('Enter password'),
                                                    style: 'floating',
                                                    required: true,
                                                    class: {
                                                        component: 'col-12',
                                                    },
                                                }
                                            );
                                        },
                                    );

                                    // Add a promise to the promises array
                                    Promises.application.push(function(label, spinner, length = 0, key = 0){
                                        return new Promise((resolve, reject) => {

                                            // Try & Catch
                                            try {

                                                // Update the label
                                                label.text("<?= $this->Locale->get('Configuring Authentication Service...') ?>");

                                                // Start the installation
                                                $.ajax({
                                                    url: '/api/installer/install',
                                                    headers: {'X-CSRF-Authorization': CSRF_KEY},
                                                    type: 'POST',dataType: 'json',
                                                    data: step.form.val(),
                                                    error: function(xhr, status, error) {
                                                        spinner.removeClass('spinner-border').addClass('rounded-circle border border-4 border-danger').html('<i class="bi bi-x-lg"></i>');
                                                        label.text("<?= $this->Locale->get('Error configuring authentication service!') ?>").css('color', 'red');
                                                        reject(new Error(xhr.responseJSON.message ?? error));
                                                    },
                                                    success: function(response) {
                                                        label.text("<?= $this->Locale->get('Authentication service configured!') ?>");
                                                        resolve();
                                                    }
                                                });
                                            } catch (error) {
                                                reject(error);
                                            }
                                        });
                                    });

                                    // Store the step for later use
                                    Steps.identification = step;
                                }
                            );
                        <?php endif; ?>

                        // Branding
                        <?php if(in_array('INSTALLER',$this->call('core'))): ?>
                            stepper.add(
                                {
                                    'icon': 'palette2',
                                },
                                function(step){

                                    // Set the step name
                                    step.name = 'branding';

                                    // Remove the click event to prevent skipping steps
                                    step.control.attr('data-bs-toggle',null).mobile.btn.attr('data-bs-toggle',null);

                                    // Handle the collapse events to update the step control
                                    step.content.on('show.bs.collapse', function () {
                                        current = step.name;
                                        step.control.html('<i class="bi bi-palette2 me-2"></i><?= $this->Locale->get("Branding") ?>');
                                    });
                                    step.content.on('hide.bs.collapse', function () {
                                        step.control.html('<i class="bi bi-palette2"></i>');
                                    });

                                    // Styling
                                    step.content.addClass('p-5');

                                    // Create a form
                                    step.form = builder.Utility(
                                        'form',
                                        step.content,
                                        {
                                            class:{
                                                component: 'row g-3 m-0',
                                            },
                                            callback:{
                                                val: function(values){
                                                    values.module = 'INSTALLER';
                                                    if(typeof values.owner === 'undefined'){
                                                        values.owner = Steps.identification.form.input('organization').val();
                                                    }
                                                    return values;
                                                },
                                            },
                                        },
                                        function(form, component){

                                            // owner
                                            <?php if(!in_array('AUTH',$this->call('core'))): ?>
                                                form.add(
                                                    'text',
                                                    {
                                                        name: 'owner',
                                                        label: builder.Locale.get('Organization'),
                                                        placeholder: builder.Locale.get('Enter organization'),
                                                        style: 'floating',
                                                        value: "<?= $this->Config->get('application','owner') ?? ($this->Config->get('installer','owner') ?? '') ?>",
                                                        required: true,
                                                        class: {
                                                            component: 'col-12',
                                                        },
                                                    }
                                                );
                                            <?php endif; ?>

                                            // name
                                            form.add(
                                                'text',
                                                {
                                                    name: 'name',
                                                    label: builder.Locale.get('Application Name'),
                                                    placeholder: builder.Locale.get('Enter name'),
                                                    style: 'floating',
                                                    value: "<?= $this->Config->get('application','name') ?? ($this->Config->get('installer','name') ?? '') ?>",
                                                    required: true,
                                                    class: {
                                                        component: 'col-12',
                                                    },
                                                }
                                            );

                                            // slogan
                                            form.add(
                                                'text',
                                                {
                                                    name: 'slogan',
                                                    label: builder.Locale.get('Application Slogan'),
                                                    placeholder: builder.Locale.get('Enter slogan'),
                                                    style: 'floating',
                                                    value: "<?= $this->Config->get('application','slogan') ?? ($this->Config->get('installer','slogan') ?? '') ?>",
                                                    required: true,
                                                    class: {
                                                        component: 'col-12',
                                                    },
                                                }
                                            );

                                            // tagline
                                            form.add(
                                                'text',
                                                {
                                                    name: 'tagline',
                                                    label: builder.Locale.get('Application Tag Line'),
                                                    placeholder: builder.Locale.get('Enter tagline'),
                                                    style: 'floating',
                                                    value: "<?= $this->Config->get('application','tagline') ?? ($this->Config->get('installer','tagline') ?? '') ?>",
                                                    required: true,
                                                    class: {
                                                        component: 'col-12',
                                                    },
                                                }
                                            );

                                            // copyright
                                            form.add(
                                                'number',
                                                {
                                                    name: 'copyright',
                                                    label: builder.Locale.get('Copyright Year'),
                                                    placeholder: builder.Locale.get('Enter copyright year'),
                                                    style: 'floating',
                                                    value: <?= $this->Config->get('application','copyright') ?? ($this->Config->get('installer','copyright') ?? date('Y')) ?>,
                                                    required: true,
                                                    class: {
                                                        component: 'col-12',
                                                    },
                                                }
                                            );
                                        },
                                    );

                                    // Add a promise to the promises array
                                    Promises.application.push(function(label, spinner, length = 0, key = 0){
                                        return new Promise((resolve, reject) => {

                                            // Try & Catch
                                            try {

                                                // Update the label
                                                label.text("<?= $this->Locale->get('Configuring Application...') ?>");

                                                // Start the installation
                                                $.ajax({
                                                    url: '/api/installer/install',
                                                    headers: {'X-CSRF-Authorization': CSRF_KEY},
                                                    type: 'POST',dataType: 'json',
                                                    data: step.form.val(),
                                                    error: function(xhr, status, error) {
                                                        spinner.removeClass('spinner-border').addClass('rounded-circle border border-4 border-danger').html('<i class="bi bi-x-lg"></i>');
                                                        label.text("<?= $this->Locale->get('Error configuring application!') ?>").css('color', 'red');
                                                        reject(new Error(xhr.responseJSON.message ?? error));
                                                    },
                                                    success: function(response) {
                                                        label.text("<?= $this->Locale->get('Application configured!') ?>");
                                                        resolve();
                                                    }
                                                });
                                            } catch (error) {
                                                reject(error);
                                            }
                                        });
                                    });

                                    // Store the step for later use
                                    Steps.branding = step;
                                }
                            );
                        <?php endif; ?>

                        // Review
                        stepper.add(
                            {
                                'icon': 'eyeglasses',
                            },
                            function(step){

                                // Set the step name
                                step.name = 'review';

                                // Styling
                                step.content.addClass('row g-3 m-0 row-cols-1 row-cols-md-2');

                                // Remove the click event to prevent skipping steps
                                step.control.attr('data-bs-toggle',null).mobile.btn.attr('data-bs-toggle',null);

                                // Handle the collapse events to update the step control
                                step.content.on('show.bs.collapse', function () {
                                    current = step.name;
                                    step.control.html('<i class="bi bi-eyeglasses me-2"></i><?= $this->Locale->get("Review") ?>');
                                    step.content.empty();
                                    for(const [name, Step] of Object.entries(Steps)){
                                        if(typeof Step.form !== 'undefined'){
                                            var col = $(document.createElement('div')).addClass('col mt-0').appendTo(step.content);
                                            col.card = $(document.createElement('div')).addClass('card mb-4 shadow-sm').appendTo(col);
                                            col.card.header = $(document.createElement('div')).addClass('card-header d-flex align-items-center').appendTo(col.card).click(function(){
                                                Step.content.collapse('show');
                                            });
                                            col.card.header.title = $(document.createElement('h5')).addClass('m-0 fw-light user-select-none').text(name.charAt(0).toUpperCase() + name.slice(1)).appendTo(col.card.header);
                                            col.card.body = $(document.createElement('div')).addClass('card-body p-0').appendTo(col.card);
                                            for(const [key, value] of Object.entries(Step.form.val())){
                                                if(Step.form.input(key) !== null){
                                                    const border = (key == Object.keys(Step.form.val())[0]) ? '' : 'border-top';
                                                    const obj = $(document.createElement('div')).addClass('card-value p-3 py-2 ' + border).appendTo(col.card.body).click(function(){
                                                        builder.Helper.copyToClipboard(value);
                                                    });
                                                    obj.label = $(document.createElement('h6')).addClass('fw-light opacity-50 m-0 user-select-none').text(Step.form.input(key).label()).appendTo(obj);
                                                    obj.value = $(document.createElement('p')).addClass('m-0').text((value) ? value : '-').appendTo(obj);
                                                }
                                            }
                                        }
                                    }
                                });
                                step.content.on('hide.bs.collapse', function () {
                                    step.control.html('<i class="bi bi-eyeglasses"></i>');
                                });

                                // Styling
                                step.content.addClass('p-5');

                                // Store the step for later use
                                Steps.review = step;
                            }
                        );

                        // Installation
                        stepper.add(
                            {
                                'icon': 'download',
                            },
                            function(step){

                                // Set the step name
                                step.name = 'progress';

                                // Remove the click event to prevent skipping steps
                                step.control.attr('data-bs-toggle',null).mobile.btn.attr('data-bs-toggle',null);

                                // Styling
                                step.content.container = $(document.createElement('div')).addClass('d-flex flex-column align-items-center justify-content-center').appendTo(step.content);
                                step.spinner = $(document.createElement('div')).addClass('spinner-border text-primary').css({height: "64px",width: "64px"}).appendTo(step.content.container);
                                step.label = $(document.createElement('div')).addClass('h5 m-0 mt-4').text('<?= $this->Locale->get("Preparing to install...") ?>').appendTo(step.content.container);

                                // Handle the collapse events to update the step control
                                step.content.on('show.bs.collapse', async function () {
                                    current = step.name;
                                    step.control.html('<i class="bi bi-download me-2"></i><?= $this->Locale->get("Progress") ?>');
                                    stepper.controls().hide();
                                    stepper.pagination().hide();

                                    // Add a 1 second delay to show the spinner
                                    await new Promise(resolve => setTimeout(resolve, 1000));

                                    // Loop and execute the promises sequentially
                                    for(const [type, promises] of Object.entries(Promises)){
                                        const length = promises.length;
                                        for(const [key, promise] of Object.entries(promises)){
                                            await promise(step.label, step.spinner, length, parseInt(key)+1);
                                        }
                                    }

                                    // Update the label
                                    step.label.text("<?= $this->Locale->get('Installation Completed!') ?>");

                                    // Redirect to the home page after spinner spinner-100 of 5 seconds
                                    step.spinner.removeClass('spinner-border').addClass('rounded-circle border border-4 border-primary').text('5');
                                    var count = 5;
                                    var interval = setInterval(() => {
                                        count--;
                                        step.spinner.text(count);
                                        if(count == 0){
                                            clearInterval(interval);
                                            window.location.href = '/';
                                        }
                                    }, 1000);
                                });
                                step.content.on('hide.bs.collapse', function () {
                                    step.control.html('<i class="bi bi-download"></i>');
                                });

                                // Styling
                                step.content.addClass('p-5 pt-4');

                                // Store the step for later use
                                Steps.progress = step;
                            }
                        );

                        // Trigger the first step
                        Current = Object.keys(Steps)[0];
                        Steps[Current].content.trigger('show.bs.collapse');
                    }
                );
            })();
        });
    </script>
<?php else: $this->interrupt(); $this->Router->render('404'); endif; ?>

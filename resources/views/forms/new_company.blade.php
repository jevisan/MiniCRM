<!-- NAME -->
@include('forms.components.text_input',
            [
                'label' => 'Name',
                'id' => 'company_name',
                'name' => 'name',
                'placeholder' => 'New Company\'s Name'
            ])
<!-- EMAIL -->
@include('forms.components.text_input',
            [
                'label' => 'Email',
                'id' => 'company_email',
                'name' => 'email',
                'type' => 'email',
                'placeholder' => 'New Company\'s Email'
            ])
<!-- WEBSITE -->
@include('forms.components.text_input',
            [
                'label' => 'Website',
                'id' => 'company_website',
                'name' => 'website',
                'value' => 'https://',
                'placeholder' => 'New Company\'s Website'
            ])
<!-- LOGO -->
@include('forms.components.file_input',
            [
                'label' => 'Logo',
                'id' => 'company_logo',
                'name' => 'logo',
            ])

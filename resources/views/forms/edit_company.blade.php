<!-- NAME -->
@include('forms.components.text_input',
            [
                'label' => 'Name',
                'id' => 'company_name',
                'name' => 'name',
                'placeholder' => 'Company\'s Name',
                'value' => $company->name
            ])
<!-- EMAIL -->
@include('forms.components.text_input',
            [
                'label' => 'Email',
                'id' => 'company_email',
                'name' => 'email',
                'type' => 'email',
                'placeholder' => 'Company\'s Email',
                'value' => $company->email
            ])
<!-- WEBSITE -->
@include('forms.components.text_input',
            [
                'label' => 'Website',
                'id' => 'company_website',
                'name' => 'website',
                'placeholder' => 'Company\'s Website',
                'value' => $company->website
            ])
<!-- LOGO -->
@include('forms.components.file_input',
            [
                'label' => 'Logo',
                'id' => 'company_logo',
                'name' => 'logo',
                'value' => $company->logo
            ])

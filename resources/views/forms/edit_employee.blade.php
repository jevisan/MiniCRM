<!-- FIRTS NAME -->
@include('forms.components.text_input', [
                'label'         => 'First Name',
                'id'            => 'first_name',
                'name'          => 'first_name',
                'value'         => $employee->first_name,
                'placeholder'   => 'Employee\'s First Name'])
<!-- LAST NAME -->
@include('forms.components.text_input', [
                'label'         => 'Last Name',
                'id'            => 'last_name',
                'name'          => 'last_name',
                'value'         => $employee->last_name,
                'placeholder'   => 'Employee\'s Last Name'])
<!-- EMAIL -->
@include('forms.components.text_input', [
                'label'         => 'Email',
                'id'            => 'employee_email',
                'name'          => 'email',
                'type'          => 'email',
                'value'         => $employee->email,
                'placeholder'   => 'Employee\'s Email'])
<!-- PHONE -->
@include('forms.components.text_input', [
                'label'         => 'Phone',
                'id'            => 'phone',
                'name'          => 'phone',
                'type'          => 'tel',
                'value'         => $employee->phone,
                'placeholder'   => 'Employee\'s Phone'])
<!-- COMPANY -->
@include('forms.components.select_input', [
                'label'     => 'Company',
                'id'        => 'select2',
                'name'      => 'company',
                'elements'  => App\Company::all(),
                'selected'  => $employee->company
])

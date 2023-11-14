@extends('layouts.app')
@section('content')
<?php $data = json_decode($data,true); ?>
<section class="policySec">
    <div class="container">
        <div class="policyMain">
            <h1 class="text-center">Terms and Conditions</h1>
            <div class="brandDesc">
                <?php echo $data['terms_conditions']['terms_and_condition'] ?>
            </div>
        </div>
    </div>
</section>
@endsection
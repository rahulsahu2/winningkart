@extends('layouts.app')
@section('content')
<?php 
    $data = json_decode($data,true);
?>

<section class="policySec">
    <div class="container">
        <div class="policyMain">
            <h1 class="text-center">Privacy Policy</h1>
            <div class="brandDesc">
                <?php echo $data['privacyPolicy']['privacy_policy'] ?>
            </div>
        </div>
    </div>
</section>


@endsection
@extends('layouts.app')
@section('content')
<?php 
    $data = json_decode($data,true);
?>

<section class="policySec">
    <div class="container">
        <div class="policyMain">
            <h1 class="text-center">{{$data["page"]["page_name"] ?? ''}}</h1>
            <div class="brandDesc">
                <?php echo $data['page']['description'] ?>
            </div>
        </div>
    </div>
</section>


@endsection
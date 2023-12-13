@php
$env = env('API_IMAGE_URL');
$session = \App\Services\APIServices\Common::GetSession();
$user = null;
if($session){
    $user = $session->notification->original->user;
    //print_r();
}

@endphp
@extends('layouts.app')
@section('content')
    <div class="main">
       
        <div class="categoryBg">
        <div class="container">
            <div class="breadcrumbMain">
                <div class="breadcrumbInner">
                    <a href="#!">Home <i class="bi bi-chevron-right"></i></a>
                    <!-- <a href="#!">Product Name <i class="bi bi-chevron-right"></i></a> -->
                    <a href="#!">My Profile </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 px-2">
                    <div class="my-accountMenus">
                        <div class="accountMenusLink">
                            <ul>
                                <li><a href="{{route('user.profile')}}" class="Pactive"><i class="bi bi-person"></i> My Profile</a></li>
                                <li><a href="#!" class="Pactive"><i class="bi bi-box-seam"></i> My Orders</a></li>
                                <li><a href="#!" class="Pactive"><i class="bi bi-heart"></i> My Wishlist</a></li>
                                <li><a href="{{route('user.logout')}}" class="Pactive"><i class="bi bi-power"></i> Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 px-2">
                    <div class="profileBxmain">
                        <div class="profileInnerCard" style="background-image: url('./assets/images/pro-bg.jpg');">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-6 col-md-6 col-sm-12 profileSmallCard">
                                        <div class="align-items-center row">
                                            <div class="col-lg-4 col-sm-3 px-2">
                                                <div class="profileImgBx">
                                                    <img src="{{$env.$user->image ?? ''}}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-sm-9 px-2">
                                                <div class="profileInfobx">
                                                    <button class="btn profileInfobxedit"  data-toggle="modal" data-target="#exampleprofileModalCenter">
                                                        <i class="bi bi-pencil"></i> Edit
                                                    </button>
                                                    <p class="Pname">Mr.{{$user->name}}</p>
                                                    <p class="Pemail"><i class="bi bi-envelope"></i>{{$user->email ?? 'NA'}}</p>
                                                    <p class="Pcontact"><i class="bi bi-telephone"></i>{{$user->phone ?? 'NA'}}</p>
                                                    <p class="Pdob"><i class="bi bi-calendar"></i>dd/mm/yyyy</p>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="profileAddressCard">
                            <div class="profileAddressCardinner">
                                <div class="profileAddressCardhead">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-lg-6 px-2">
                                            <h3><i class="bi bi-house-door"></i> My Addresses</h3>
                                        </div>
                                        <div class="col-lg-6 px-2">
                                            <div class="text-right">
                                                <button class="btn profileAddressadd" data-toggle="modal" data-target="#exampleaddModalCenter">
                                                    <i class="bi bi-plus-lg"></i> Add New Address
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="profileaddCardmain">
                                    <div class="row">
                                        <div class="col-md-6 pr-1 pl-1">
                                            <div class="add-address-box-addres p-3">
                                                <div class="address-name">
                                                    <h5>Mr. Gautam</h5>
                                                    <p>1245 neemrana, Rajasthan</p>
                                                    <p>Neemrana-301714</p>
                                                    <p>9999XXXXXX</p>
                                                </div>
                                                <div class="d-flex gap-10 justify-content-end mt-0">
                                                    <button class="btn addEditcard" data-toggle="modal" data-target="#exampleaddModalCenter"><i class="bi bi-pencil"></i> Edit</button>
                                                    <button class="btn addDeletecard"><i class="bi bi-trash"></i> Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
  <!-- Address Modal -->
  <div class="modal fade" id="exampleaddModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
            <div class="modalAddressmain">
                <div class="modalAddressinner p-3 position-relative">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-lg"></i>
                      </button>
                    <form>
                        <div class="row px-1">
                            <div class="col-lg-12 px-2 mb-2">
                                <div class="formBox">
                                    <label>Select Country</label>
                                    <select class="form-control">
                                        <option>India</option>
                                        <option>Nepal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 px-2 mb-2">
                                <div class="formBox">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-12 px-2 mb-2">
                                <div class="formBox">
                                    <label>Mobile No.</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-12 px-2 mb-2">
                                <div class="formBox">
                                    <label>Postal Code</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-12 px-2 mb-2">
                                <div class="formBox">
                                    <label>Address</label>
                                    <textarea class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 px-2 mb-2">
                                <div class="formBox">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Use this as my default Shipping Address</label>
                                      </div>
                                </div>
                            </div>
                            <div class="col-lg-12 px-2 ">
                                <div class="formBox mb-0">
                                    <button class="btn orderplacedbtn w-100">Add Address</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Profile Modal -->
  <div class="modal fade" id="exampleprofileModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
            <div class="modalAddressmain">
                <div class="modalAddressinner p-3 position-relative">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-lg"></i>
                      </button>
                    <form>
                        <div class="row px-1">
                            <div class="col-lg-12 px-2">
                                <div class="modalProfileimg">
                                    <img src="{{$env.$user->image}}" alt="{{$user->name}}">
                                </div>
                            </div>
                            <div class="col-lg-12 px-2 mb-2">
                                <div class="formBox">
                                    <label>Name</label>
                                    <input type="text" class="form-control" value="{{$user->name}}" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-12 px-2 mb-2">
                                <div class="formBox">
                                    <label>Mobile No.</label>
                                    <input type="text" class="form-control" value="{{$user->phone}}" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-12 px-2 mb-2">
                                <div class="formBox">
                                    <label>Email Id.</label>
                                    <input type="text" class="form-control" value="{{$user->email}}" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-12 px-2 mb-2">
                                <div class="formBox">
                                    <label>DOB</label>
                                    <input type="date" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-12 px-2 mb-2">
                                <div class="formBox">
                                    <label>Gender</label>
                                    <!-- <input type="date" class="form-control" placeholder=""> -->
                                    <div class="genderBox">
                                        <div class="row px-1">
                                            <div class="col-lg-3 col-sm-6 px-2">
                                                <input type="radio" id="Gmale" class="d-none" name="gender">
                                                <label for="Gmale"><i class="bi bi-gender-male"></i> Male</label>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 px-2">
                                                <input type="radio" id="Gfemale" class="d-none" name="gender">
                                                <label for="Gfemale"><i class="bi bi-gender-female"></i> Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 px-2">
                                <div class="formBox mb-0">
                                    <button class="btn orderplacedbtn w-100">Done</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
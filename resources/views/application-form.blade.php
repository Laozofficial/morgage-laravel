@extends('layouts.app')

@section('content')
    @include('layouts.header')
<!-- inner-banner -->
<section class="inner-banner" id="home" {{asset('images/innerbanner.jpg')}}>
	<div class="inner-layer">
		<div class="container">
		</div>
	</div>
</section>
<!-- //inner-banner -->

<!-- breadcrumb -->
<div class="breadcrumb-w3pvt">
	<div class="container">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/">Home</a>
			</li>
			<li class="breadcrumb-item" aria-current="page">Application Form</li>
		</ol>
	</nav>
	</div>
</div>
<!-- //breadcrumb -->



<div class="container mt-5 col-md-8">

  <h1 class="text-center">Application Form</h1>

  <div class="mt-5" id="app">
    <div>
      <label>Full Name</label>
      <input class="form-control mb-3" type="text" v-model="full_name" placeholder="full Name"/>

      <label>Email</label>
      <input class="form-control mb-3" type="email" v-model="email" placeholder="Email"/>

      <label>Phone Number</label>
      <input class="form-control mb-3" type="text" v-model="phone" placeholder="Phone Number"/>

      <label>Bank Name</label>
      <input class="form-control mb-3" type="text" v-model="bank_name" placeholder="bank Name"/>

      <label>Work Place</label>
      <input class="form-control mb-3" type="text" v-model="work_place" placeholder="Work Place"/>

      <label>Date of Birth</label>
      <input class="form-control mb-3" type="date" v-model="dob" placeholder="Date of Birth"/>

      <label>BVN</label>
      <input class="form-control mb-3" type="text" v-model="bvn" placeholder="Bank verification Number"/>

      <label>Picture of Drivers Licence </label>
      <input class="form-control mb-3" type="file" ref="file" v-on:change="handleImageUpload" placeholder="Driver's Licence"/>

      <label>Upload an Image of Yourself</label>
      <input class="form-control mb-3" type="file" ref="file" v-on:change="handleAvatarUpload" placeholder="Avatar"/>

      <label>Home Address</label>
      <input class="form-control mb-3" type="text" v-model="address" placeholder="address"/>


      <button class="btn btn-banner1 my-3 btn-block btn-primary" v-on:click="save_application">
        @{{submit}}
      </button>

    </div>
  </div>

</div>



@endsection
@section('script')

<script>
 new Vue({
   el:'#app',
   data: {

    full_name: '',
    bank_name: '' ,
    work_place: '',
    dob: '',
    bvn: '',
    drivers_licence: '',
    avatar: '',
    address: '',
    email: '',
    phone: '',

    submit: 'submit'
   },
   mounted() {
   },
   methods: {
    save_application(){
      if(this.full_name == '' || this.bank_name == '' || this.work_place == '' || this.dob  == '' || this.bvn == '' || this.drivers_licence == '' || this.avatar == '' || this.address == '' || this.email == '' || this.phone == ''){
        alert('some fields are empty');
      }else{
          this.submit_application();
      }
    },
    submit_application(){
        this.submit = 'submitting......'
        let fd = new FormData;
        fd.append('full_name', this.full_name)
        fd.append('work_place', this.work_place)
        fd.append('bank_name', this.bank_name)
        fd.append('dob', this.dob)
        fd.append('bvn', this.bvn)
        fd.append('driver_licence', this.drivers_licence)
        fd.append('avatar', this.avatar)
        fd.append('address', this.address)
        fd.append('email', this.email)
        fd.append('phone_number', this.phone)

        axios.post('/save_application', fd)
            .then((response) => {
                console.lg(response);
                alert(response.data.success);
            })
            .catch((error) => {
                console.log(error);
                alert('something went wrong');
            })
            .then(() => {
                this.submit = 'submit'
            })
    },
    handleImageUpload() {
        this.drivers_licence = this.$refs.file.files[0];
        console.log('handled the image upload');
    },
    handleAvatarUpload(){
      this.avatar = this.$refs.file.files[0];
        console.log('handled the avatar upload');
    }
   },
 })

</script>

@endsection

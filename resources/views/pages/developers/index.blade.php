@extends('layout.layout')

@section('content')
<div class="container">
<br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="team-area sp">
                        <div class="container">
                            <div class="row">
                                @foreach($developers as $developer)
                                <div class="col-sm-6 col-md-4 col-lg-2 single-team">
                                    <div class="inner">
                                    <div class="team-img">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Member Photo">
                                    </div>
                                    <div class="team-content">
                                        <h4>Name: {{ $developer->name }}</h4>
                                        <!--
                                        <h5>Email: {{ $developer->email }}</h5>
                                        <h5>Github: {{ $developer->github }} </h5>                                      </h5>
                                        <h5>Technologies: {{ $developer->technologies }} </h5>
                                        <h5>Level: {{ $developer->level }}</h5> -->
                                        <div>
                                            <!-- href="{{ route('developers.show', $developer->id) }}" -->
                                            <?php $dev = json_encode($developer)?>
                                            <button onclick="abrirModal({{ json_encode($dev) }})"><i class="fa fa-user" style="font-size:130%;"></i></button>
                                            @can('update', $developer)
                                                <a href="{{ route('developers.edit', $developer->id) }}"><i class="material-icons">edit</i></a>
                                            @endcan
                                            @can('delete', $developer)
                                                <form action="{{ route('developers.destroy', $developer->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"><i class="material-icons">delete</i></button>
                                                </form>
                                            @endcan
                                        </div>

                                    </div>
                                    </div>
                                </div>
                                @endforeach
                           </div>
                        </div>
                     </div>

                     <div style="display:flex; flex-direction:row;" class="justify-content-center">
                        <div  class="d-flex justify-content-center" style="display:inline-block;">
                            {{ $developers->links() }}
                        </div>
                        &nbsp;&nbsp;
                        @can('create', $developer)
                        <div class="d-flex justify-content-center" style="display:inline-block;">
                            <a href="{{ route('developers.create') }}" class="btn btn-secondary" style="background-color: #50bcb3;">Create</a>
                        </div>
                        @endcan
                     </div>

                    <div class="modal" id="modal_employee" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Employee Description</h5>
                                <button type="button" onclick="fecharModal()" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control"  id="name" name="name" placeholder="Enter name"  disabled="true">
                              </div>
                              <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" disabled="true">
                            </div>
                            <div class="mb-3">
                                <label for="github" class="form-label">GitHub</label>
                                <input type="text" class="form-control" id="github" name="github" placeholder="Enter GitHub username" disabled="true">
                            </div>
                            <div class="mb-3">
                                <label for="bio" class="form-label">Bio</label>
                                <textarea class="form-control" id="bio" name="bio" rows="3" placeholder="Enter bio" disabled="true">{{ $developer->bio }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="technologies" class="form-label">Technologies</label>
                                <input type="text" class="form-control" id="technologies" name="technologies" placeholder="Enter technologies" disabled="true">
                            </div>
                            <div class="mb-3">
                                <label for="college" class="form-label">College</label>
                                <input type="text" class="form-control" id="college" name="college" placeholder="Enter college" disabled="true">
                            </div>
                            <div class="mb-3">
                                <label for="course" class="form-label">Course</label>
                                <input disabled="true" type="text" class="form-control" id="course" name="course" placeholder="Enter course" disbaled="true">
                            </div>
                            <div class="mb-3">
                                <label for="certifications" class="form-label">Certifications</label>
                                <input disabled="true" type="text" class="form-control" id="certifications" name="certifications" placeholder="Enter certifications">
                            </div>
                            <div class="mb-3">
                                <label for="company" class="form-label">Company</label>
                                <input disabled="true" type="text" class="form-control" id="company" name="company" placeholder="Enter company">
                            </div>
                            <div class="mb-3">
                                <label for="level" class="form-label">Level</label>
                                <select disabled="true" class="form-select" id="level" name="level">
                                    @foreach(['intern', 'junior', 'intermediate', 'senior', 'lead', 'manager', 'director', 'vp', 'executive', 'admin', 'specialist', 'consultant'] as $level)
                                        <option value="{{ $level }}" {{ $developer->level == $level ? 'selected' : '' }}>{{ ucfirst($level) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input disabled="true" type="text" class="form-control" id="city" name="city" placeholder="Enter city" >
                            </div>
                            <div class="mb-3">
                                <label for="state" class="form-label">State</label>
                                <input disabled="true" type="text" class="form-control" id="state" name="state" placeholder="Enter state" >
                            </div>
                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input disabled="true" type="text" class="form-control" id="country" name="country" placeholder="Enter country">
                            </div>
                            <div class="mb-3">
                                <label for="work_mode" class="form-label">Work Mode</label>
                                <select disabled="true" class="form-select" id="work_mode" name="work_mode">
                                    @foreach(['home_office', 'presential', 'hybrid'] as $mode)
                                        <option value="{{ $mode }}" {{ $developer->work_mode == $mode ? 'selected' : '' }}>{{ str_replace('_', ' ', ucfirst($mode)) }}</option>
                                    @endforeach
                                </select>
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

<script>
    function abrirModal(developer) {
        developer2 = JSON.parse(developer);
        var modal = document.getElementById("modal_employee");
        var name           = document.getElementById("name");
        var email          = document.getElementById("email");
        var github         = document.getElementById("github");
        var bio            = document.getElementById("bio");
        var technologies   = document.getElementById("technologies");
        var college        = document.getElementById("college");
        var course         = document.getElementById("course");
        var certifications = document.getElementById("certifications");
        var company        = document.getElementById("company");
        var level          = document.getElementsByName("level");
        var city           = document.getElementById("city");
        var state          = document.getElementById("state");
        var country        = document.getElementById("country");
        var work_mode      = document.getElementById("work_mode");

        name.value = developer2.name;
        email.value = developer2.email;
        github.value = developer2.github;
        bio.value = developer2.bio;
        technologies.value = developer2.course;
        college.value = developer2.college;
        course.value = developer2.course;
        certifications.value = developer2.certifications
        level.value = developer2.level;
        company.value = developer2.company;
        city.value = developer2.city;
        state.value = developer2.state;
        country.value = developer2.country;
        work_mode.value = developer2.work_mode;

        modal.style.display = "block";
    }

    function fecharModal() {
        var modal = document.getElementById("modal_employee");
        modal.style.display = "none";
    }
</script>
@endsection



@section('styles')
<style>
    body{height:100%;}
    .single-team .inner {
        text-align: center;
        margin-bottom: 35px;
        border: 1px solid #e5eaf0;
        padding: 5px 5px 0px;
    }

    .single-team .inner .team-img {
        position: relative;
    }

    .single-team .inner .team-img img {
        width: 100%;
    }

    .single-team .inner .team-img::after {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        opacity: 0;
    }

    .single-team .inner .team-img:hover::after {
        opacity: 0.4;
    }

    .single-team .inner .team-content {
        padding: 22px 0px 0px;
    }

    .single-team .inner .team-content h4 {
        font-size: 18px;
        font-weight: 400;
    }

    .single-team .inner .team-content h5 {
        font-weight: 300;
        font-size: 16px;
        letter-spacing: 0.5px;
        color: #7d91aa;
    }

    .single-team .inner .team-content a {
        display: inline-block;
        padding: 2px;
        margin: 0 3px;
        font-size: 16px;
    }

    .team-social {
        background: #f3f6fa;
        width: 50%;
        padding-top: 4px;
        margin: auto;
        border-radius: 15px 15px 0px 0px;
        margin-top: 17px;
    }

</style>
@endsection

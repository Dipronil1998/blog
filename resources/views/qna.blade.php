@extends('layouts.frontend.app')

@section('title','Q&A')

@push('css')
	<link href="{{ asset('assets/frontend/css/single-post/styles.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/frontend/css/single-post/responsive.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
@endpush

@section('content')
	<div class="slider">
		<div class="display-table  center-text">
			<h1 class="title display-table-cell"><b>Q&A</b></h1>
		</div>
	</div>
	<section class="comment-section">
		<div class="container">
			<div class="row">

				<div class="col-lg-12 col-md-12">
					<div class="comment-form">
						<form action="{{ route('qna.store') }}" method="POST">
							@csrf
							<div class="row">

								<div class="col-sm-6">
									<input type="text" aria-required="true" name="name" class="form-control"
										placeholder="Enter your name" aria-invalid="true" required >
								</div><!-- col-sm-6 -->
								<div class="col-sm-6">
									<input type="email" aria-required="true" name="email" class="form-control"
										placeholder="Enter your email" aria-invalid="true" required>
								</div><!-- col-sm-6 -->

								<div class="col-sm-12">
									<textarea name="qna" rows="2" class="text-area-messge form-control"
											placeholder="Enter your query" aria-required="true" aria-invalid="false"></textarea >
								</div><!-- col-sm-12 -->
								<div class="col-sm-12">
									<button class="submit-btn" type="submit" id="form-submit"><b>SUBMIT</b></button>
								</div><!-- col-sm-12 -->

							</div><!-- row -->
						</form>
					</div><!-- comment-form -->

					<h4><b>COMMENTS({{$qnas->count()}})</b></h4>
					@if($qnas->count()==0)
						<div class="commnets-area ">
								<div class="comment">
									<p>No Question found</p>
								</div>
							</div>
					@else
						<div class="commnets-area ">
						@foreach($qnas as $qna)
							<div class="commnets-area ">
								<div class="comment">
									<div class="post-info">
											<a class="name" href="#"><b>{{ $qna->name }}</b></a>
											<h6 class="date">{{ $qna->email }}</h6>
											
											<h6>{{ $qna->created_at->diffForHumans() }}</h6>
									</div><!-- post-info -->
									<p>{{ $qna->qna }}</p>
								</div>
							</div>
						@endforeach
					</div><!-- commnets-area -->
					@endif

				</div><!-- col-lg-8 col-md-12 -->

			</div><!-- row -->

		</div><!-- container -->
	</section>

@endsection

@push('js')
<script type="text/javascript">
        function deleteQna(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
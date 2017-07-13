
				<section class="sidebar-section">
					<h1 class="h1-side">News Feed</h1>
					<p class="helper-hr-2"></p>

					<section class="sidebar-section-loop">
						@foreach($sbposts as $sb)
						<div class="post">
							<h3 class="h3-main-sb">
								<a href="{{ route('blog.single', $sb->slug) }}">
									{!! $sb->title !!}
								</a>
								<br>
								<small>
									{{ date('F j, Y', strtotime($sb->created_at)) }}<br>
									{{ $sb->category->name }}
								</small>
							</h3>
							<p>
								{!! substr($sb->body, 0, 100) !!}
								{!! strlen($sb->body) > 100 ? ' [...]' : '' !!}
							</p>
							<p>
								<a href="{{ route('blog.single', $sb->slug) }}" class="btn btn-primary btn-sm">Read More &raquo;</a>
							</p>
							
						</div><!-- post -->
						<p class="helper-hr-2"></p>
						@endforeach

						<!-- CONTACT SECTION -->
@include('templates.sections.address-sidebar')

					</section><!-- sidebar-section-loop -->
				</section><!-- sidebar-section -->
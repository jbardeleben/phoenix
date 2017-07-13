
				<section class="sidebar-section">
					<h1 class="h1-side">News Feed</h1>
					<p class="helper-hr-2"></p>

					<section class="sidebar-section-loop">
						@foreach($posts as $post)
						<div class="post">
							<h3 class="h3-main-sb">
								<a href="{{ route('blog.single', $post->slug) }}">
									{!! $post->title !!}
								</a>
								<br>
								<small>
									{{ date('F j, Y', strtotime($post->created_at)) }}<br>
									{{ $post->category->name }}
								</small>
							</h3>
							<p>
								{!! substr($post->body, 0, 100) !!}
								{!! strlen($post->body) > 100 ? ' [...]' : '' !!}
							</p>
							<p>
								<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary btn-sm">Read More &raquo;</a>
							</p>
							
						</div><!-- post -->
						<p class="helper-hr-2"></p>
						@endforeach

						<!-- CONTACT SECTION -->
@include('templates.sections.address-sidebar')

                        <a href="{{ route('blog.index') }}" class="btn btn-sm btn-default btn-block" title="View All Posts">
                            View All Posts
                        </a>
					</section><!-- sidebar-section-loop -->
				</section><!-- sidebar-section -->
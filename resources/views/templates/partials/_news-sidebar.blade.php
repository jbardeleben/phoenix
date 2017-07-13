
          <section style="margin-top: 10px;">
            <h1 class="h1-side">News Feed</h1>
            <p class="helper-hr-2"></p>

            @foreach($posts as $post)
            <div class="post">
              <h3 class="h3-main-sb">
                <a href="{{ route('blog.single', $post->slug) }}">{!! $post->title !!}</a>
                <br>
                <small>{{ date('F j, Y', strtotime($post->created_at)) }} | {{ $post->category->name }}</small>
              </h3>
              <p>
                {!! substr($post->body, 0, 70) !!}
                {!! strlen($post->body) > 70 ? ' [...]' : '' !!}
              </p>
              <p><a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More &raquo;</a></p>		
            </div><!-- post -->
            <p style="border-bottom: 3px solid #CCCCCC;"></p>
            @endforeach

            <!-- CONTACT SECTION -->
            <p class="helper-br-3"></p>
            <h1 class="h1-side">Contact Us</h1>
            <p class="helper-hr-2"></p>

            @include('templates.partials._address')
          </section>
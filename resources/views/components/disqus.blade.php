@props(['id'])

<div class="my-16 bg-beige bg-opacity-20">
    <div class="mx-auto max-w-6xl px-4 py-16">
        <h2 class="text-2xl font-bold">Comments</h2>
        <div class="max-w-2xl">
            <div id="disqus_thread"></div>
            <script>
                var disqus_config = function() {
                    // Replace PAGE_URL with your page's canonical URL variable
                    // this.page.url = PAGE_URL;

                    // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    this.page.identifier = '{{ $id }}';
                };


                (function() { // REQUIRED CONFIGURATION VARIABLE: EDIT THE SHORTNAME BELOW
                    var d = document,
                        s = d.createElement('script');

                    // IMPORTANT: Replace EXAMPLE with your forum shortname!
                    s.src = 'https://www-joyoflanguages-com.disqus.com/embed.js';

                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
        </div>
    </div>
</div>

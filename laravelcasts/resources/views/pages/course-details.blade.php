<x-guest-layout :page-title="config('app.name') . ' - ' . $course->title">

    @push('social-meta')
        <meta name="description" content="{{ $course->description }}">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ route('page.course-details', $course) }}">
        <meta property="og:title" content="{{ $course->title }}">
        <meta property="og:description" content="{{ $course->description }}">
        <meta property="og:image" content="{{ asset("images/$course->image_name") }}">

        <!-- Twitter -->
        <meta name="twitter:card" content="summary_large_image">
    @endpush

    <div class="relative py-12">
        <div class="relative px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-lg lg:grid lg:grid-cols-2 lg:gap-4">

                <!-- Course details -->
                <div class="order-2 p-8 md:order-1">
                    <div class="prose lg:self-center">
                        <h2 class="mb-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                            <span class="block">{{ $course->tagline }}</span>
                        </h2>
                        <p class="block mb-0 text-2xl text-yellow-500">{{ $course->title }} ({{ $course->videos_count }} videos)</p>
                        <p class="mt-4 text-lg leading-6 text-gray-900">{{ $course->description }}</p>
                        <a href="#!" data-product="{{ $course->paddle_product_id }}" data-theme="none" class="inline-flex items-center px-6 py-3 mt-8 text-base font-medium text-gray-900 bg-yellow-400 border border-transparent rounded-md shadow paddle_button hover:text-red-500">Buy
                            Now!</a>
                        <h3>Learnings</h3>
                        <ul>
                            @foreach($course->learnings as $learning)
                                <li>{{ $learning }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- Course details -->

                <!-- Course image -->
                <div class="flex items-start order-1 p-8 md:order-2 aspect-w-5 aspect-h-3 md:aspect-w-2 md:aspect-h-1">
                    <img class="transform rounded-md" src="{{ asset("images/$course->image_name") }}"
                         alt="App screenshot">
                </div>
                <!-- Course image -->

            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.paddle.com/paddle/paddle.js"></script>
        <script type="text/javascript">
            @env('local')
                Paddle.Environment.set('sandbox');
            @endenv
                Paddle.Setup({ vendor: {{ config('services.paddle.vendor-id') }}});
        </script>
    @endpush

</x-guest-layout>

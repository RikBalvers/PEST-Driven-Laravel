<div>
    <div class="py-8 mx-auto max-w-7xl">

        <div class="flex flex-col my-24 md:flex-row">

            <!-- Video -->
            <div class="w-full p-6 md:w-3/4 md:p-0">
                <iframe class="w-full mb-4 rounded aspect-video md:mb-8" src="https://player.vimeo.com/video/{{ $video->vimeo_id }}" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                <div class="flex justify-end">
                    @if($video->alreadyWatchedByCurrentUser())
                        <button class="px-4 py-2 text-xs bg-yellow-400 rounded-md hover:bg-yellow-500"
                                wire:click="markVideoAsNotCompleted">Mark as <strong>not</strong> completed
                        </button>
                    @else
                        <button class="px-4 py-2 text-xs bg-yellow-400 rounded-md hover:bg-yellow-500"
                                wire:click="markVideoAsCompleted">Mark as completed
                        </button>
                    @endif
                </div>

                <div>
                    <h3 class="mb-2 text-xl font-bold">{{ $video->title }} ({{ $video->getReadableDuration() }})</h3>
                    <p>{{ $video->description }}</p>

                </div>
            </div>
            <!-- Video -->

            <!-- Video list -->
            <div class="w-full p-6 md:w-1/4 md:p-0">
                <div>
                    <ul role="list" class="divide-y divide-gray-200 md:ml-12">
                        @foreach($courseVideos as $courseVideo)
                            <li class="py-4">
                                <div class="flex space-x-3">
                                    @include('partials.svg.play')
                                    <div class="flex-1 space-y-1">
                                        <div class="flex items-center justify-between">
                                            @if($this->isCurrentVideo($courseVideo))
                                                <h3 class="font-bold text-md">{{ $courseVideo->title }} @if($courseVideo->alreadyWatchedByCurrentUser())✅@endif</h3>
                                            @else
                                                <a href="{{ route('page.course-videos', [$courseVideo->course, $courseVideo]) }}">
                                                    <h3 class="font-medium text-md">{{ $courseVideo->title }} @if($courseVideo->alreadyWatchedByCurrentUser())✅@endif</h3>
                                                </a>
                                            @endif
                                            <p class="text-sm text-gray-500">{{ $courseVideo->getReadableDuration() }}</p>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- Video list -->

        </div>
    </div>
</div>

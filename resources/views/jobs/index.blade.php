@extends('layouts.application')
@section('content')
	<?php
		$count = 0;
	?>
	@foreach($allJobs as $jobs)
		<?php
			$jobs->body = preg_replace("/&nbsp;/",'',$jobs->body);
			$colorsArray = ['orange', 'red', 'purple', 'blue', 'indigo'];
			$linkId = explode('-', $jobs->source_slug);
		?>
		<div class="max-w-sm mx-auto lg:w-1/3 mb-6 px-4">
			<div class="bg-white shadow rounded border-t-4 border-{{ $colorsArray[$count] }} post-container">
				<div class="py-2 px-2 text-xl font-semibold bg-{{ $colorsArray[$count] }}-lightest border-b border-{{ $colorsArray[$count] }} job-title">
				{{ ucfirst($jobs->title) }}
				</div>
				<div class="p-4 company-description-container">
					<div class="text-lg mb-2 text-grey-darkest font-semibold">{{ $jobs->company->name }}</div>
					<div class="text-base text-grey-darker description" data-desc="{{ $jobs->body }}" title="Click to view full description...">
						{{ str_limit(strip_tags($jobs->body), 200) }}
					</div>
				</div>
				<div class="lg:flex lg:items-stretch border-t-2 p-2">
					<div class="flex text-sm items-center">
						<?php
						$tagCount = 0;
						?>
						@foreach($jobs->tags->sortBy->name as $tag)
							<?php
							if($tagCount > 2)
								break;
							?>
							<span class="mr-1 font-semibold">{{ $tag->name }}</span>
							<?php $tagCount++; ?>
						@endforeach
					</div>
					<div class="lg:flex lg:items-stretch lg:justify-end ml-auto">
						<a href="https://remoteok.io/l/{{ $linkId[0] }}" target="_BLANK" class="no-underline px-2 py-1 bg-green-light text-black font-bold rounded hover:bg-green-dark hover:text-white text-sm apply-link">Apply</a>
					</div>
				</div>
				<div class="border-t-2 p-2 text-xs">
					<span> via <a href='' class="no-underline text-grey-darker">Remote Ok</a></span>
					<span class="float-right">
						Posted: {{ $jobs->created_at->diffForHumans() }}
					</span>
				</div>
			</div>
		</div>
		<?php
			$count++;
			if($count == 4)
				$count = 0;
		?>
	@endforeach

	@if(isset($allJobs))
		<div class="w-full text-center mt-8 mb-16">
	    @if($allJobs->currentPage() > 1)
	         <a href="{{ $allJobs->previousPageUrl() }}" class="bg-teal p-2 rounded no-underline text-black">&laquo; Previous</a>
	    @endif

	   @if($allJobs->hasMorePages())
	        <a href="{{ $allJobs->nextPageUrl() }}" class="bg-teal p-2 rounded no-underline text-black">Next &raquo;</a>
	    @endif
	    </div>
	@endif
	<!-- The Modal -->
	<div id="myModal" class="modal">

	  <!-- Modal content -->
	<div class="modal-content">
	  <div class="modal-header">
	    <span class="close-modal mr-2">&times;</span>
	    <h2 class="modal-job-title">Modal Header</h2>
	  </div>
	  <div class="modal-body">

	  </div>
	  <div class="modal-footer">

	  </div>
	</div>

	</div>
@endsection

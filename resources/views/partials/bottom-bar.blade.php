<div class="w-full">
	<section id="bottom-navigation" class=" rounded-lg block fixed inset-x-0 bottom-0 z-1 bg-white shadow flex justify-between p-4">
		<div>
		@if($orderObj != null) 
	<button class="p-2 text-white font-light tracking-wider bg-gray-900 rounded-lg" @click="order = true; product = false; open = false;">
		Cart
			<span class="bg-teal-300 border-2 border-gray-500 rounded-full px-1"
"> {{count($orderObj)}}</span>  
</button>
		@endif
		</div>
	<div class="" @click="$wire.createOrderArray; order = false; product = false; open = true;">
		@if($product != null) 
			@if ($product->id)
			<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#bfba09" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
				<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
			</svg>
			@endif	
		@endif
	</div>
{{--<div :class="order ? '' : 'hidden'" >
		Send order
	</div>--}}
	<div>@if($orderObj != null) R{{$total_price}} @endif</div>
	</section>
</div>

    
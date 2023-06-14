<div>
    <style>
    .loader {
    border-top-color: #2980bb;
    -webkit-animation: spinner 1.5s linear infinite;
    animation: spinner 1.5s linear infinite;
    }

    @-webkit-keyframes spinner {
    0% { -webkit-transform: rotate(0deg); }
    100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spinner {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
    }
    </style>

    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">
        <div class="flex flex-row">
        <div>
            {{$label}}
        </div>
        <div wire:loading>
            <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-700 h-6 w-6 ml-2"></div>
        </div>
        </div>
    </button>
</div>
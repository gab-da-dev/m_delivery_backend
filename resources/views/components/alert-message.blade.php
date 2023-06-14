
<div x-data="{ shown: false, message: ''}"
    x-init="@this.on('showAlert', (msg) => {
        shown = true; 
        message = msg;
        setTimeout(() => { 
            shown = false 
            }, 3000); 
            })"
    x-show.transition.opacity.out.duration.1500ms="shown"
    style="display: none; top: 12%;"
    class="rounded-r-md bg-yellow-500 p-4 border-l-4 border-yellow-400 mb-3 absolute right-0">
        <span class="text-gray-700 text-sm" x-text="message"></span>
</div>


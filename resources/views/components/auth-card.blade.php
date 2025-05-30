<div class="min-h-screen flex flex-col justify-center items-center pt-6">
    <div class="w-[1200px] !w-[1200px] mt-6 bg-white overflow-hidden" 
         style="border-radius: 28px; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15), 0 8px 32px rgba(0, 0, 0, 0.1); padding: 3.5rem; min-height: 500px;">
        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                {{ $logo }}
            </div>
        </div>
        
        <div class="space-y-6">
            {{ $slot }}
        </div>
    </div>
</div>
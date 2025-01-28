@if(session()->has('message'))
<div x-data="{show:true}" x-init= "setTimeout(()=> show = false, 5000 )"  x-show="show"
style="position: fixed; top: 20px; left: 20px; padding: 15px; background-color: #dff0d8; color: #3c763d; border: 1px solid #d6e9c6; border-radius: 4px; z-index: 1000;">
    <p>
    {{ session('message') }}
   </p>
</div>
@endif
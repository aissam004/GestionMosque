

<x-admin-lte-layout>
    <x-slot name="header">
        @if (isset($materiel))
        {{__("modify commande")}}
        @else
        {{__("create commande")}}
        @endif
    </x-slot>

    <div id="dynamic_form">
        <div class="form-control">
          <input type="text" name="p_name" id="p_name" placeholder="Enter Product Name">
        </div>
        <div class="form-control">
            <select name="select" id="select" class="select-options" placeholder="Enter Product Name">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
          </div>

        <div class="button-group">
          <a href="javascript:void(0)" class="btn btn-primary" id="plus">Add More</a>
          <a href="javascript:void(0)" class="btn btn-danger" id="minus">Remove</a>
        </div>
    </div>



    <form action="">
        <p>
          <span>add more</span>
          <input type="text" placeholder="name">
          <select class="removeDuplication">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
          <select>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
        </p>
      </form>


</x-admin-lte-layout>




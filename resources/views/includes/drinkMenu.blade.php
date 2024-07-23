<nav class="tm-black-bg tm-drinks-nav">
  <ul>
    @foreach($categories as $category)
      <li>
        <a href="#" class="tm-tab-link" data-id="{{ $category->id }}">{{ $category->categoryName }}</a>
      </li>
    @endforeach
  </ul>
</nav>

<div id="cold" class="tm-tab-content">
  <div class="tm-list">
    <div class="tm-list-item">          
      <img src="{{ asset('assets/img/iced-americano.png') }}" alt="Image" class="tm-list-item-img">
      <div class="tm-black-bg tm-list-item-text">
        <h3 class="tm-list-item-name">Iced Americano<span class="tm-list-item-price">$10.25</span></h3>
        <p class="tm-list-item-description">Here is a short description for the first item. Wave Cafe Template is provided by Tooplate.</p>
      </div>
    </div>                        
  </div>
</div> 

<div id="hot" class="tm-tab-content">
  <div class="tm-list">
  
    <div class="tm-list-item">          
      <img src="{{ asset('assets/img/hot-americano.png') }}" alt="Image" class="tm-list-item-img">
      <div class="tm-black-bg tm-list-item-text">
        <h3 class="tm-list-item-name">Hot Americano<span class="tm-list-item-price">$8.50</span></h3>
        <p class="tm-list-item-description">Here is a short description for the item along with a squared thumbnail.</p>              
      </div>
    </div>      
  </div>
</div>

<div id="juice" class="tm-tab-content">
  <div class="tm-list">
    <div class="tm-list-item">          
      <img src="{{ asset('assets/img/smoothie-1.png') }}" alt="Image" class="tm-list-item-img">
      <div class="tm-black-bg tm-list-item-text">
        <h3 class="tm-list-item-name">Strawberry Smoothie<span class="tm-list-item-price">$12.50</span></h3>
        <p class="tm-list-item-description">Here is a short description for the item along with a squared thumbnail.</p>              
      </div>
    </div>             
  </div>
</div>
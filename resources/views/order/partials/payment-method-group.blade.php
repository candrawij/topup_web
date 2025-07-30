<div class="child-box payment-drawwer shadow {{ $active ?? false ? 'active' : '' }}">
    <div class="header short-payment-support-info-head" onclick="openPaymentDrawer(this)">
        <div class="left">
            <i class="{{ $icon }} mr-2"></i>
            <span>{{ $title }}</span>
        </div>
        <div class="right">
            <i class="fas fa-chevron-down"></i>
        </div>
    </div>
    
    <div class="button-action-payment" style="display: {{ $active ?? false ? 'block' : 'none' }};">
        <ul>
            @foreach($methods as $method)
            <li>
                <input type="radio" name="payment_id" id="payment{{ $method['id'] }}" value="{{ $method['id'] }}" {{ $loop->first && ($active ?? false) ? 'checked' : '' }}>
                <label for="payment{{ $method['id'] }}" class="payment-item">
                    <div class="info-top">
                        <img src="{{ $method['image'] }}" alt="{{ $method['name'] }}">
                        <b>{{ $method['name'] }}</b>
                    </div>
                    @if(isset($method['name']))
                    <div class="info-bottom">{{ $method['name'] }}</div>
                    @endif
                </label>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="short-payment-support-info" onclick="openPaymentDrawer(this.parentElement.querySelector('.header'))">
        @foreach($methods as $method)
            <img src="{{ $method['image'] }}" alt="{{ $method['name'] }}" class="m-1" style="border-radius: 1px">
        @endforeach
        <a class="open-button-action-payment">
            <i class="fas fa-chevron-{{ $active ?? false ? 'up' : 'down' }}"></i>
        </a>
    </div>
</div>
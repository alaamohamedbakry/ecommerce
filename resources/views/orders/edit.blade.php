<style>
    .highlighted-text {
        font-weight: bold;
        color: #FFA500;
        display: inline;
    }

    .highlighted-text::after {
        content: '';
        display: block;
        width: 50px;
        height: 3px;
        background: #FFA500;
        margin-top: 5px;
    }

    .header-text {
        display: flex;
        align-items: center;
    }
</style>
    <x-app-layout>
    <x-slot name="header">
        <h3 class="mb-4 text-lg text-gray-700 capitalize font-la header-text">
            <span class="highlighted-text">EDIT Order</span>
        </h3>
    </x-slot>
    <form method="POST" action="{{ route('orders.update', $order->id) }}">
        @csrf
        @method('PATCH')
        <div class="grid grid-cols-2 gap-4">
            <div>
                <x-input-label for='name'>NAME</x-input-label>
                <x-text-input value="{{ $order->name }}" name='name'></x-text-input>
                @error('name')
                    <x-input-label for='name'>{{ $message }}</x-input-label>
                @enderror
            </div>
            <div>
                <x-input-label for='email'>EMAIL</x-input-label>
                <x-text-input value="{{ old('email', $order->email) }}" name='email'></x-text-input>
                @error('email')
                    <x-input-label for='email'>{{ $message }}</x-input-label>
                @enderror
            </div>
            <div>
                <x-input-label for='city'>City</x-input-label>
                <x-text-input value="{{ old('city', $order->city) }}" name='city'></x-text-input>
                @error('city')
                    <x-input-label for='city'>{{ $message }}</x-input-label>
                @enderror
            </div>
            <div>
                <x-input-label for='address'>ADDRESS</x-input-label>
                <x-text-input value="{{ old('address', $order->address) }}" name='address'></x-text-input>
                @error('address')
                    <x-input-label for='address'>{{ $message }}</x-input-label>
                @enderror
            </div>
            <div>
                <x-input-label for='phone'>Phone</x-input-label>
                <x-text-input value="{{ old('phone', $order->phone) }}" name='phone'></x-text-input>
                @error('phone')
                    <x-input-label for='phone'>{{ $message }}</x-input-label>
                @enderror
            </div>
            <div>
                <x-input-label for='customer_id'>customer</x-input-label>
                <select name="customer_id">
                    <option selected disabled value="">Select Item</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                </select>
                @error('customer_id')
                    <x-input-label for='customer_id'>{{ $message }}</x-input-label>
                @enderror
            </div>
            <div>
                <x-danger-button>
                    Update Order
                </x-danger-button>
            </div>
        </div>
    </form>
</x-app-layout>

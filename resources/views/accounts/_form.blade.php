<p>
  <label>Name</label>
  <input type="text" name="name" 
    value="{{ old('name', $account->name ?? null) }}" />
</p>
<p>
  <label>Balance</label>
  <input type="number" step="0.01" name="balance" 
    value="{{ old('balance', $account->balance ?? null) }}" />
</p>
<input style="display: none" type="number" name="user_id" value="{{ $user_id }}"/>

@if($errors->any())
  <div>
    <ul>
      @foreach ($errors->all() as $error)
        <li style="color: red">{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
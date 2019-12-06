<p>
  <label>Debit/Credit</label>
  <input type="text" list="modifiers" name="modifier"
    value="{{ old('modifier', $account->modifier ?? null) }}" /> 
  <datalist id="modifiers">
    <option value="Credit">
    <option value="Debit">
  </datalist>
</p>
<p>
  <label>Amount</label>
  <input type="number" step="0.01" name="amount" 
    value="{{ old('amount', $transaction->amount ?? null) }}" />
</p>
<p>
  <label>Description</label>
  <input type="text" name="description" 
    value="{{ old('balance', $transaction->description ?? null) }}" />
</p>
<input style="display: none" type="number" name="account_id" value="{{ $account->id }}"/>
  
  @if($errors->any())
    <div>
      <ul>
        @foreach ($errors->all() as $error)
          <li style="color: red">{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
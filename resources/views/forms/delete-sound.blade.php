<form action="{{ route('sounds.destroy', $sound->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="button" class="dropdown-item" onclick="return myConfirm(this.parentElement);">
        {{ __('Delete') }}
    </button>
</form>
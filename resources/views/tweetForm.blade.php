
    <form action="/validatetweet" method='post'>
        @csrf
    <input type="text" name='title' value="{{Auth::user()->name}}" readonly>
        <input type="text" name="content" value="enter tweet">
        <input type="submit" name="submit">
    </form>
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('content')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror


<form method="POST" action="/newparticipant">
    @csrf
    <input type="text" name="name" placeholder="Name"/>
    <input type="text" name="email" placeholder="Email"/>
    <input type="password" name="password" placeholder="Password"/>
    <button>register</button>
</form>

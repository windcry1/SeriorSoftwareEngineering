function change_name(name) {
    var dict = {
        "user1.m3u8":"mac端",
        "user2.m3u8":"iPhone端",
        "user3.m3u8":"iPad端",
    }
    return dict[name];
}
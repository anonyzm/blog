# Почему TDD это совсем не про тестирование

> I’m sure I’ll find other ways to solve all these problems. In time. The pain will fade. Farewell TDD, old friend.
>
> <cite>- Kent Beck</cite>

```
func TestShopRepositoryCreate(t *testing.T) {
    db, mock := db.NewMockDB()

    mock.ExpectQuery("INSERT INTO shops (.+) VALUES (.+)").
    WithArgs(1, "Магазин на Луковой", "Москва, Луковая улица, 1", 55.1234, 37.4567).
    WillReturnRows(mock.NewRows([]string{"id"}).AddRow(1))

    shopRepository := NewShopRepository(db)
    shop := &Shop{ID: 1, Name: "Магазин на Луковой", Address: "Москва, Луковая улица, 1", Lat: 55.1234, Lng: 37.4567}
    id, err := shopRepository.Create(shop)
    assert.NoError(t, err, "error should be nil")
    assert.Equal(t, int64(1), id, "inserted id should be 1")
}
```

Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.


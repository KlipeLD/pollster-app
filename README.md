# Pollster App

> **Uwaga:** jest to projekt testowy/demonstracyjny realizowany w 2022 roku w celach realizacji zadania testowego. Nie jest to kompletna aplikacja produkcyjna.

## O projekcie

Pollster App to prosta aplikacja do budowania i przeglądania badań ankietowych. Pozwala zarządzać strukturą ankiety w układzie:

`badanie -> pytania -> opcje odpowiedzi`

Panel WWW umożliwia:

- dodawanie, edytowanie i usuwanie badań,
- przypisywanie badaniu statusu: **Edycja**, **Testowanie** lub **Gotowe**,
- dodawanie pytań oraz ustalanie ich kolejności,
- wybór typu pytania: jednokrotny albo wielokrotny wybór,
- dodawanie opcji odpowiedzi wraz z ich wartościami,
- podgląd gotowego formularza ankiety.

Widok ankiety renderuje pytania jednokrotnego wyboru jako pola radio, a pytania wielokrotnego wyboru jako checkboxy. W statusie **Testowanie** wyświetlane są również identyfikatory pytań i opcji.

Obecna wersja służy do definiowania i prezentowania ankiet. Nie zawiera obsługi wysyłania odpowiedzi przez respondentów, zapisywania wyników, raportów ani logowania użytkowników.

## API

Aplikacja udostępnia proste, publiczne endpointy tylko do odczytu. API zwraca dane wyłącznie dla badań ze statusem **Gotowe** (`status = 3`).

| Metoda | Endpoint | Opis |
| --- | --- | --- |
| `GET` | `/api/v1/survey/{survey}` | Dane wybranego badania |
| `GET` | `/api/v1/survey-questions/{survey}` | Pytania przypisane do badania |
| `GET` | `/api/v1/survey-questions-options/{survey}/{question}` | Opcje odpowiedzi dla pytania |

## Technologie

- PHP 8.0.2 lub nowszy,
- Laravel 9,
- MySQL,
- Blade,
- Bootstrap 5.0.2,
- Vite 4 (obsługa zasobów frontendowych),
- PHPUnit 9.

## Model danych

- `surveys` — nazwa i status badania,
- `questions` — treść, typ, pozycja oraz identyfikator badania,
- `options` — treść, wartość oraz identyfikator pytania.

Modele Eloquent odwzorowują relacje: badanie ma wiele pytań, a pytanie ma wiele opcji odpowiedzi.

## Uruchomienie lokalne

Wymagane są PHP, Composer oraz działająca baza MySQL. Node.js jest potrzebny tylko wtedy, gdy chcesz przebudowywać zasoby przez Vite.

1. Zainstaluj zależności PHP:

   ```bash
   composer install
   ```

2. Utwórz plik konfiguracyjny środowiska:

   ```bash
   cp .env.example .env
   ```

   W systemie Windows można użyć:

   ```powershell
   Copy-Item .env.example .env
   ```

3. Ustaw połączenie z bazą danych w `.env`, przede wszystkim wartości `DB_DATABASE`, `DB_USERNAME` i `DB_PASSWORD`.

4. Wygeneruj klucz aplikacji i utwórz tabele:

   ```bash
   php artisan key:generate
   php artisan migrate
   ```

5. Opcjonalnie zainstaluj i uruchom Vite:

   ```bash
   npm install
   npm run dev
   ```

6. Uruchom serwer aplikacji:

   ```bash
   php artisan serve
   ```

7. Otwórz listę badań pod adresem:

   ```text
   http://127.0.0.1:8000/index
   ```

## Testy

Testy można uruchomić poleceniem:

```bash
php artisan test
```

Repozytorium zawiera obecnie jedynie przykładowe testy dostarczane ze szkieletem Laravel, dlatego nie pokrywają one logiki zarządzania ankietami.

## Ograniczenia wersji testowej

- brak uwierzytelniania i autoryzacji,
- brak zapisywania odpowiedzi respondentów oraz wyników,
- brak rozbudowanej dokumentacji i wersjonowania odpowiedzi API,
- brak przykładowych danych w seederach,
- migracje nie definiują więzów obcych ani usuwania kaskadowego,
- kod wymaga dodatkowego utwardzenia i testów przed użyciem produkcyjnym.

## Licencja

Projekt bazuje na frameworku Laravel udostępnianym na licencji MIT.

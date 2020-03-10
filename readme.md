# Trip Service Kata 

## 這個是？

*Trip Service Kata* 是最近參與社群 *Domain Driven Design(DDD Taiwan)* 所舉辦的讀書會 *Legacy Code 讀書會 1st (Ch1-5)* 所分享的重構練習題目，程式碼來源 [在這裡](https://github.com/FongX777/trip-service-kata)，這個 Repository 為筆者的完整練習過程。

## 題目講解
* 針對 `src/Trip/TripService` 中的 `getTripsByUser` Method 撰寫測試案例。
* 呼叫 `getTripsByUser` 的測試案例需完成以下三項。
    * `throwExceptionWhenUserIsNotLoggedIn`：當使用者尚未登入時，也就是滿足 `$loggedUser != null` 時，應該拋出一個 Exception `UserNotLoggedInException`。
    * `isNotTripsWhenLoggedUserIsNotFriend`：當登入的使用者不等於參數 `$user` 的好友，也就是 `$user->getFriends()` 當中不存在 `$loggedUser` 時，則**不應該**回傳 變數 `$tripList`。 
    * `isTripsWhenLoggedUserIsFriend`：當登入的使用者等於參數 `$user` 的好友，則**應該**回傳 變數 `$tripList`。
 
## 備註
* 在不影響 `src/Trip/TripService` 中的 `getTripsByUser` 的邏輯之下，進行重構。

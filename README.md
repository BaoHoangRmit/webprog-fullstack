# webprog-fullstack
This is the fullstack assignment repository of group

    ------ KHÔNG ĐƯỢC PUSH THẲNG VÀO BRANCH MAIN VÀ DEVELOP------

Code ở main sẽ là code cuối cùng và bao gồm những function đã hoàn thiện 100 % nên ko dc pull hay push vào branch này

Code sẽ được update liên tục ở branch Develop với những function đang được build - mng pull code từ đây vào và không code trực tiếp vào branch, nhớ merge (hướng dẫn ở dưới)



    ------- Nếu chưa có nhánh => Tạo nhánh bằng cách -------


1/ Checkout vào develop: git checkout develop

2/ Pull code mới nhất từ develop: git pull origin develop

3/ Tạo nhánh từ code develop vừa pull về: git checkout -b <Tên nhánh>

Lúc này đã có nhánh mới, có thể code ngay ở nhánh này

Nếu không may code nhầm ngay tại nhánh develop khi pull code về thì vẫn có thể dùng (3) để tạo nhánh với nguyên chỗ đã code


    ------ pull code develop về trước khi code nếu đã merge nhánh vào develop từ lần code trước ------
    ------- Nếu đã có nhánh, khi code xong 1 chức năng (khi chưa code xong thì chỉ được push lên nhánh của mình) ------


1/ git add .

2/ git commit -m <Nội dung commit> (Lúc này nếu ở bước 3 pull về conflict quá không sửa được có thể revert lại commit này)

3/ git pull origin develop (Kéo code mới nhất từ develop)

4/ Nếu conflict yêu cầu fix conflict, khi fix xong, kiểm tra chạy ngon trên máy thì thực hiện lại bước 1 và 2

5/ git push origin <tên nhánh của mình>:<tên nhánh muốn merge vào- ở đây là develop>

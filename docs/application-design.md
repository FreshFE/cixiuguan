# Application Design

## 功能

### API部分

1. 签到创建接口（含评价内容）
2. 获得景点签到数量
3. 获得景点签到的评价
4. 获得公告列表
5. 获得公告详情

### 管理员后台部分

1. 管理景点签到内容，签到列表、详情及删除
2. 公告的管理，创建、发布、编辑、列表、详情及删除
3. 管理员账户体系

---

## 数据库

1. checkin
    1. id
    2. place_id
    3. lat
    4. lng
    5. comments
    6. stars
    7. valid_tag
    8. create_at
    9. update_at

2. announcement
    1. id
    2. title
    3. content
    4. valid_tag
    5. create_at
    6. update_at

## 路由

## 控制器

## JSON 返回

## 视图
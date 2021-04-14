import $http from "axios";
import {CreateCommentElement} from "../components/article/article-comments-section";

type Comment = object;
type CommentCollection = Array<Comment>;

async function GetComments(): Promise<CommentCollection> {
    const response = await $http.get<CommentCollection>("/v1/comments/recent");
    return response.data;
}

(async function() {
    const section = document.querySelector("[data-section-last-comments]")

    const comments = await GetComments();

    for (let comment of comments) {
        section.appendChild(
            CreateCommentElement(comment)
        );
    }
})();
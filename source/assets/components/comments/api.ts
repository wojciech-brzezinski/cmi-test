import $http from "axios";
import { CommentCollection } from "./types";

export class CommentsAPI {

    static async findMostRecent(): Promise<CommentCollection> {
        return (await $http.get<CommentCollection>("/v1/comments/recent")).data;
    }

    static async findForArticleID(articleID: string): Promise<CommentCollection> {
        return (await $http.get<CommentCollection>(`/v1/comments?article=${articleID}`)).data;
    }
}

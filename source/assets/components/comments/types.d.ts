export interface Comment {
    created_at: string;
    owner_id: string;
    text_value: string;
    uuid: string;
}

export type CommentCollection = Array<Comment>

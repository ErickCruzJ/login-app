export const APP ={
    NAME: "NovaPanel",
    VERSION: "1.0.0",
    PAGINATION:{
        DEFAULT_PAGE_SIZE: 10,
        PAGE_SIZE_OPTIONS: [10,25,50,100],
    },
    UPLOADS: {
        MAX_IMAGE_SIZE: 2*1024*1024,
        ALLOWED_IMAGE_TYPES:[
            "image/jpeg",
            "image/png",
            "image/webp",
        ],
    },
}as const;